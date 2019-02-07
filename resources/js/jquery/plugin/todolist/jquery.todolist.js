var EnterKey = 13;


var TodoListIW = {
    $e_todolist: null,
    $e_title: null,
    $e_form: null,

    count:0,

    demand_id: 0,
    lazy_writing: false,

    todo_update: function(id, data, callback) {

        if (this.lazy_writing) {
            if ($.isFunction(callback)) callback({id:this.count+1});
            return;
        }

        var action_url = (id)?("/todo/update/"+id+"/"):("/todo/create/");
        $.ajax({
            url: action_url,
            dataType: 'json',
            method: 'post',
            data: data,
            success: function (response) {
                if (response.status == 200) {

                    toastr.success('ToDo-пункт успешно обновлен', 'ToDo');

                    if (callback != undefined) {
                        if (typeof(callback) === "function") {
                            callback(response);
                        } else {
                            window[callback](response);
                        }
                    }
                } else {
                    toastr.error("Ошибка обновления ToDo-пункта", "Ошибка обновления");
                }
            }
        });
    },

    todo_save_status: function(id, status, callback) {
        if (this.lazy_writing) {
            if ($.isFunction(callback)) callback();
            return;
        }

        $.ajax({
            url: "/todo/set_status/"+id+"/",
            dataType: 'json',
            method: 'post',
            data: {status: status},
            success: function (response) {
                if (response.status == 200) {

                    toastr.success('ToDo-пункт успешно обновлен', 'ToDo');

                    if (callback != undefined) {
                        if (typeof(callback) === "function") {
                            callback(response);
                        } else {
                            window[callback](response);
                        }
                    }
                } else {
                    toastr.error("Ошибка обновления ToDo-пункта", "Ошибка обновления");
                }
            }
        });

    },

    todo_add: function(data, callback) {
        this.todo_update(0, data, callback);
    },

    todo_delete: function(id, callback) {
        if (this.lazy_writing) {
            if ($.isFunction(callback)) callback();
            return;
        }

        $.ajax({
            url: "/todo/delete/"+id+"/",
            dataType: 'json',
            method: 'get',
            success: function (response) {
                if (response.status == 200) {

                    toastr.success('ToDo-пункт успешно удален', 'ToDo');

                    if (callback != undefined) {
                        if (typeof(callback) === "function") {
                            callback(response);
                        } else {
                            window[callback](response);
                        }
                    }

                } else {
                    toastr.error("Ошибка удаления ToDo-пункта", "Ошибка удаления");
                }
            }
        });

    },

    bind: function($new_todo) {
        var self = this;

        // Смена статуса
        $new_todo.find(".todo-toggle input:checkbox").on('ifToggled', function(event){
            var $icheck = $(this);
            var $item = $(this).closest("li");
            $icheck.iCheck('disable');
            self.todo_save_status($item.data("id"), ($icheck.is(":checked"))?1:0, function() {
                $item.toggleClass("todo-done");
                $icheck.iCheck('enable');
            });
            //alert(event.type + ' callback'+$(this).is(":checked"));
        });


        // Удаление
        $new_todo.find(".btn.fa-trash-o").on("click", function() {
            var $item = $(this).closest("li");
            bootbox.confirm({message: "Вы уверены, что хотите удалить пункт из чек-листа!", title: "Удаление пункта чек-листа", callback: function(r) { if (r) {

                self.todo_delete($item.data("id"), function() {
                    $item.slideToggle(function() { $(this).remove(); });
                });

            } }});
            return false;
        });

        // Редактирование
        $new_todo.find(".btn.fa-pencil").on("click", function(e) {
            var $item = $(this).closest("li");
            var $e_title = $($item).find(".todo-title-sp");

            $item.find(".todo-actions").hide();
            $e_title.hide();

//            var save_text = $e_title.html();

            var input = '';
            input+='<div class="input-group input-group-sm">';
                input+='<input type="text" value="'+$e_title.html()+'" class="form-control input-sm">';
                input+='<span class="input-group-btn">';
                    input+='<button class="btn btn-sm btn-success fa fa-save" type="button"></button>';
                    input+='<button class="btn btn-sm btn-default fa fa-times" type="button"></button>';
                input+='</span>';
            input+='</div>';

            $(input).insertAfter($e_title);

            var $input = $item.find(".input-group input:text").focus();

            // Отмена
            $item.find(".btn.fa-times").on("click", function() {
                $(this).closest(".input-group").remove();
                $e_title.show();
                $item.find(".todo-actions").show();
                return false;
            });

            // Применение
            $item.find(".btn.fa-save").on("click", function() {
                var new_title = $(this).closest(".input-group").find("input:text").val();
                if (new_title) {

                    self.todo_update($item.data("id"), {title: new_title});

                    $item.find("input[name^='todo']:text").val(new_title);
                    $e_title.html(new_title).show();
                    $(this).closest(".input-group").remove();
                    $item.find(".todo-actions").show();

                } else {
                    $item.find(".btn.fa-trash-o").click();
                }
                return false;
            });

            $input.keypress(function(e) {
                if (e.which === EnterKey) {
                    $item.find(".btn.fa-save").click();
                    return false;
                }
            });


            return false;
        });

        $new_todo.find(".todo-title-sp").dblclick(function() {
            $(this).closest("li").find(".btn.fa-pencil").click();
        });

        // Редактирование
    },

    build_item: function(id, data) {
        var item = '';
        item+='<li class="list-primary">';
        item+='<i class=" fa fa-ellipsis-v"></i>';
        item+='<div class="todo-toggle i-checks">';
        item+='<input name="todo['+id+'][status]" type="checkbox" value="1">';
        item+='</div>';
        item+='<div class="todo-title">';
        item+='<input name="todo['+id+'][title]" type="hidden" value="'+data.title+'"/>';
        item+='<span class="todo-title-sp">'+data.title+'</span>';
        item+='<div class="pull-right todo-actions">';
        item+='<div class="btn-group btn-group-sm">';
        item+='<button class="btn btn-default btn-sm fa fa-pencil"></button>';
        item+='<button class="btn btn-danger btn-sm fa fa-trash-o"></button>';
        item+='</div>';
        item+='</div>';
        item+='</div>';
        item+='</li>';

        return item;

    },

    add: function(title) {
        if (!title) { return;}

        var self = this;



        this.todo_add({title:title, demand_id: this.demand_id}, function(response) {
            self.$e_todolist.append(self.build_item(response.id, {title: title}));
            var $new_todo = self.$e_todolist.find("li:last");
            $new_todo.attr("data-id", response.id);
            self.count++;
            CoreIW.init_icheck($new_todo);
            self.bind($new_todo);

        });

    },

    observer: function() {
        var self = this;

        // Добавление
        this.$e_form.find("button").on("click", function() {
            self.add(self.$e_title.val());
            self.$e_title.val('');
            return false;
        });

        this.$e_title.keypress(function(e) {
            if (e.which === EnterKey) {
                self.add($(this).val());
                $(this).val('');
                return false;
            }
        }).on("paste", function(e) {

            var paste = (e.originalEvent || e).clipboardData.getData('text/plain');

            if (paste) {
                var ar_text = paste.split('\n');
                if (ar_text.length>1) {
                    $(paste.split('\n')).each(function(i,text) {
                        if (text) { self.add(text); }
                    });

                    setTimeout(function() {
                        self.$e_title.val('');
                    }, 10);
                }
            }
        });
    },

    init: function (demand_id ,lazy_writing) {
        this.$e_todolist    = $("#todo-list");
        this.$e_form        = $('#todo-list-form');
        this.$e_title       = this.$e_form.find("input:text");

        this.demand_id = demand_id;
        this.lazy_writing = lazy_writing;
        this.count = this.$e_todolist.find("li").length;

        this.bind(this.$e_todolist.find("li"));

        this.observer();
    }

};
