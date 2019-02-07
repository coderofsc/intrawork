{include file="main/title.tpl"}

<div class="container-fluid">
    <div class="row well well-sm">
        <div class="col-sm-12">
            <div class="form-horizontal form-clamped">
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_date}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">{$favorite_data.unix_create_date|ts2text}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_events_type_object}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">{cls_modules::$ar_modules[$favorite_data.module_id].morph.0|mb_ucfirst}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_code}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">{$favorite_data.object_id}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_name}</label>
                    <div class="col-sm-10 col-xs-8 ">
                        <p class="form-control-static">
                            {$favorite_data.object_name}{* <a href="{cls_modules::$ar_modules[$favorite_data.module_id].alias}/view/{$favorite_data.object_id}/">открыть</a>*}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <legend>Детали объекта</legend>
    {include file="./modules/{cls_modules::$ar_modules[$favorite_data.module_id].alias}.tpl"}

</div>

