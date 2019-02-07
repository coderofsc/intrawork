var fmIW = {
    $fm_container: $("#fm-container"),
    current_folder_id: 0,

    get_folders: function() {
        var $block = $("#fm-folders");

        $.ajax({
            url: 'files/get_folders/',
            dataType: 'json',
            success: function (response) {
                $block.html(response.data);
                fmIW.init_folders();
                fmIW.init_actions();
                fmIW.init_drop();
                fmIW.init_folders_nestable();

                $block.find("li[data-id="+fmIW.current_folder_id+"]").addClass("active");
            }
        });
    },

    init_folders: function() {

        $("#folders-nestable").find("a[data-id]").on("click", function() {
            fmIW.current_folder_id = $(this).data("id");

            $("#current_folder_id").val(fmIW.current_folder_id);

            var $self = $(this);

            $("#folder-loading").removeClass("hidden");

            $.ajax({
                url: "/files/folder/"+fmIW.current_folder_id+"/",
                dataType: 'json',
                method: 'post',

                success: function (response) {
                    if (response.status == 200) {
                        fmIW.$fm_container.mixItUp('destroy');

                        if (response.total > 0) {
                            fmIW.$fm_container.html(response.data);
                        } else {
                            fmIW.$fm_container.empty();
                        }

                        fmIW.init_mixitup();
                        fmIW.init_drag();

                        $self.closest("#folders-nestable").find("li").removeClass("active");
                        $self.parent().addClass("active");

                        $("#folder-loading").addClass("hidden");

                        /*if ($icon.length) {
                            $icon.prop('class', $icon.data('restore-class'));
                        }*/

                    } else {
                        toastr.error("Ошибка получения списка файлов", "Ошибка чтения");
                    }
                }
            });

            return false;
        });

    },

    init_drag: function() {
        fmIW.$fm_container.find(".file-box").draggable({
            //revert: function(event, ui) { return !event; },
            revert: false,
            helper : 'clone',
            cursor:	 'move',
            appendTo: "body",//$("#main-content"),
            opacity : 0.5,
            scroll: true,
            zIndex: 5,
            start: function(){
                $(this).data("origPosition",$(this).position());
            }

        });

    },

    init_drop: function() {

        $('#fm-folders li.dd-item').droppable({
            tolerance : 'pointer',
            hoverClass: "active",
            accept : 'div.file-box',
            greedy: true ,
            drop : function(event, ui) {
                //alert(1);
                //$(this).append(ui.draggable);
                //ui.draggable.detach().appendTo($(this));
                var file_id = ui.draggable.find(".file[data-id]").data("id");
                var folder_id = $(this).data("id");
                var file_name = ui.draggable.find(".file-name .title").text();
                var folder_name = $(this).find(".title").first().text();

                bootbox.confirm({message: "Переместить файл "+file_name+" в папку "+folder_name+"?", title: "Перемещение", callback: function(r) { if (r) {
                    $.ajax({
                        url: 'files/move_file/'+file_id+'/',
                        dataType: 'json',
                        method: "post",
                        data: {folder_id: folder_id},
                        success: function (response) {

                            if (response.status == 200) {
                                ui.draggable.addClass("targets-to-remove");
                                fmIW.$fm_container.mixItUp('filter', ':not(.targets-to-remove)', function(){
                                    $(this).find('.targets-to-remove').remove();
                                });
                                toastr.success('Файл успешно перемещен в папке '+folder_name);
                            } else {
                                toastr.error('Ошибка перемещения файла');
                            }

                        }
                    });
                } else { ui.draggable.animate(ui.draggable.data("origPosition"),"slow"); } }});

            }
        });

    },

    init_mixitup: function() {
        fmIW.$fm_container.mixItUp({
            callbacks: {
                onMixStart: function(state){
                    $("#empty-folder").hide();
                },
                onMixEnd: function(state){
                    if (state.totalShow > 0) {
                        $("#empty-folder").fadeOut();
                    } else {
                        $("#empty-folder").fadeIn();

                    }
                }
            }
        });
    },

    update_folders_order: function() {
        console.log(1);
        var json = $('#folders-nestable').nestable('serialize');

        console.log(json);

        return false;

        $.ajax({
            method: 'post',
            url: 'files/update_folders_order/',
            data: {json: json},
            dataType: 'json',
            success: function(response) {
            }
        });
    },

    init_folders_nestable: function() {
        $("#folders-nestable").nestable({
            threshold:5
        }).on('change', function() {
            fmIW.update_folders_order();
            // флаг изменения
        });

    },

    upload_done: function(data) {
        if (data.result.status == 1) {
            toastr.success(data.result.name+'.'+data.result.ext+' успешно загружен');
            fmIW.$fm_container.mixItUp('prepend', $(data.result.item), {filter: 'all'});
        } else {
            toastr.error('Ошибка загрузки файла');
        }

        $("#fileinput-button").removeClass("disabled").find("span").html("Добавить файлы");
    },

    upload_start: function() {
        $("#progress-upload").removeClass("hidden");
        $("#fileinput-button").addClass("disabled").find("span").html('<i class="fa fa-spinner fa-spin"></i> Ждите...');
    },

    upload_processalways: function(data) {
        var index = data.index, file = data.files[index];

        if (index + 1 === data.files.length) {
            if (!!data.files.error) {
                toastr.error(file.name+' ошибка загрузки файла');
            }
        }
    },

    upload_progressall: function(data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress-upload-files').find('.progress-bar').css('width', progress + '%').html(progress + '%');
        $('#progress-upload-files-status').html(human_filesize(data.loaded)+' / '+human_filesize(data.total));

        if (progress == 100) {
            $("#progress-upload").addClass("hidden").find(".progress-bar").css("width", 0).html("0%");
        }
    },

    init_upload: function() {
        $('#fileupload').fileupload({
            dataType: 'json',
            sequentialUploads: true,
            maxFileSize: 5000000,
            previewCrop: false,

            done: function (e, data) {
                fmIW.upload_done(data);
            },

            start: function() {
                fmIW.upload_start();
            },

            processalways: function(e, data) {
                fmIW.upload_processalways(data);
            },

            progressall: function (e, data) {
                fmIW.upload_progressall(data);
            }
        });
    },

    init_actions: function() {
        $("#folders-nestable").find(".folder-delete").on("click", function(e) {
            $(this).closest(".btn-group.open .dropdown-menu").dropdown('toggle');

            var folder_id = $(this).closest("li.dd-item").data("id");

            bootbox.confirm({message: "Вы уверены? Все вложенные папки и файлы будут безвозвратно удалены!", title: "Удаление папки", callback: function(r) { if (r) {
                $.ajax({
                    url: 'files/delete_folder/'+folder_id+'/',
                    dataType: 'json',
                    method: "post",
                    data: {name: r},
                    success: function (response) {
                        fmIW.get_folders();
                    }
                });
            } }});

            return false;
        });

        $("#folders-nestable").find(".folder-edit").on("click", function() {
            $(this).closest(".btn-group.open .dropdown-menu").dropdown('toggle');
            var $self = $(this);
            var folder_id = $self.closest("li.dd-item").data("id");

            bootbox.prompt({value: $self.closest("li.dd-item").find("span.title").html(), title: "Переименование папки", callback: function(r) { if (r) {
                $.ajax({
                    url: 'files/update_folder/'+folder_id+'/',
                    dataType: 'json',
                    method: "post",
                    data: {name: r},
                    success: function (response) {
                        fmIW.get_folders();
                    }
                });
            } }});
            return false;
        });

        $("#fm-folders").find(".folder-create").on("click", function() {
            bootbox.prompt({title: "Создание папки", callback: function(r) { if (r) {
                $.ajax({
                    url: 'files/create_folder/',
                    dataType: 'json',
                    method: "post",
                    data: {name: r, parent_id: fmIW.current_folder_id},
                    success: function (response) {
                        fmIW.get_folders();
                    }
                });


            } }});
            return false;
        });

    },

    init_delete_files: function() {
        fmIW.$fm_container.on("click", ".file-delete", function() {
            var id = $(this).closest(".file").data("id");
            var $filebox = $(this).closest(".file-box");
            bootbox.confirm({message: "Вы уверены? Файл будет безвозвратно удален!", title: "Удаление файла", callback: function(r) { if (r) {
                $.ajax({
                    url: 'files/delete_file/'+id+'/',
                    dataType: 'json',
                    method: "post",
                    data: {folder_id: fmIW.current_folder_id},
                    success: function (response) {
                        $filebox.addClass("targets-to-remove");
                        fmIW.$fm_container.mixItUp('filter', ':not(.targets-to-remove)', function(){
                            $(this).find('.targets-to-remove').remove();
                        });
                    }
                });
            } }});
            return false;
        });
    },

    init: function() {
        fmIW.init_mixitup();
        fmIW.get_folders();
        fmIW.init_drag();
        fmIW.init_upload();
        fmIW.init_delete_files();
    }

};

$(function () {
    fmIW.init();
});