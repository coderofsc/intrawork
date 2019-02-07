$(function () {

    /*$(document).on('click', '.attach-delete', function () {

        var self = $(this);

        bootbox.confirm({message: "Вы действительно хотите удалить этот файл?", title: "Удаление файла", callback: function(result) {
            if (result) {
                var hash = $(self).attr("href").substring(1);
                var attach_id = $(self).data("attach-id");

                $(self).attr("disabled", "disabled").find("i").attr("class", "fa fa-spinner fa-spin");

                $.ajax({
                    type: "post",
                    url: "tools/attach_delete.php",
                    data: {hash: hash, attach_id: attach_id, parent_id: '{/literal}{$tender_data.hash}{literal}', owner: {/literal}{$smarty.const.OWNER_DEMAND}{literal}},
            dataType: "json",
                success: function(data) {
                if (data.status == 0) {
                    toastr.error('Ошибка удаления файла');
                } else {
                    $(self).closest("tr").remove();
                    toastr.success(data.name+'.'+data.ext+' успешно удален');
                }
            }
        });
    }
}});

return false;
});*/

$('#fileupload').fileupload({
    dataType: 'json',
    sequentialUploads: true,
    /*formData: {owner: {/literal}{$smarty.const.OWNER_DEMAND}{literal}},*/

    maxFileSize: 5000000,
    previewCrop: false,
    /*{/literal}
     {if $attach_type == "flash"}
     acceptFileTypes: /(\.|\/)(sfw)$/i,
     {else}
     acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
     {/if}
     {literal}*/


    done: function (e, data) {
        if (data.result.status == 1) {
            var buffer = '<tr>';
            buffer+= '<td>';
            if (data.result.thumb == 1) {
                buffer+='<a rel="attach" class="fancybox" href="file_storage/'+data.result.root+data.result.dir+data.result.hash+'.'+data.result.ext+'">';
                buffer+='<img class="img-thumbnail img-circle" style="width:32px; height:32px" src="file_storage/'+data.result.root+data.result.dir+'thumbs/'+data.result.hash+'_xs.jpg" />';
                buffer+='</a> ';
            }

            buffer+=(data.result.name+'.'+data.result.ext);

            buffer+= '<input name="ar_attach[hash][]" type="hidden" value="'+data.result.hash+'">';
            buffer+= '</td>';
            buffer+='<td>'+human_filesize(data.result.size)+'</td>';
            buffer+='<td class="text-right"><a href="#'+data.result.hash+'" data-attach-id="#'+data.result.storage_id+'" class="attach-delete btn btn-sm btn-warning" onclick="$(this).closest(\'tr\').remove(); return false;"><i class="fa fa-times"></i> удалить</a></td>';
            buffer+='</tr>';

            $('#attach_files').append(buffer).removeClass("hidden");

            toastr.success(data.result.name+'.'+data.result.ext+' успешно загружен');
        } else {
            toastr.error('Ошибка загрузки файла');
        }
        $("#fileinput-button").removeClass("disabled").find("span").html("Добавить файлы");
    },

    start: function() {
        $("#progress-upload").removeClass("hidden");
        $("#fileinput-button").addClass("disabled").find("span").html('<i class="fa fa-spinner fa-spin"></i> Ждите...');
    },

    processalways: function(e, data) {
        var index = data.index, file = data.files[index];

        if (index + 1 === data.files.length) {
            if (!!data.files.error) {
                toastr.error(file.name+' ошибка загрузки файла');
            }
        }
    },

    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress-upload-files').find('.progress-bar').css('width', progress + '%').html(progress + '%');
        $('#progress-upload-files-status').html(human_filesize(data.loaded)+' / '+human_filesize(data.total));

        if (progress == 100) {
            $("#progress-upload").addClass("hidden").find(".progress-bar").css("width", 0).html("0%");
        }
    }
});
});
