{include file="main/title.tpl"}

<div class="container-fluid">
    <div class="row well well-sm">
        <div class="col-sm-12">
            <div class="form-horizontal form-clamped">
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_date}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">{$trash_data.unix_delete_date|ts2text}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{cls_modules::$ar_modules[cls_modules::MODULE_USERS].morph.0|mb_ucfirst}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">{$trash_data.user_fio}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_events_type_object}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">{cls_modules::$ar_modules[$trash_data.module_id].morph.0|mb_ucfirst}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_code}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">{$trash_data.object_id}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_name}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">{$trash_data.object_name}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <legend>Детали объекта</legend>
    {include file="./modules/{cls_modules::$ar_modules[$trash_data.module_id].alias}.tpl"}

</div>

