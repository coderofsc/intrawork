<div class="container-fluid">

    <div class="form-horizontal form-clamped">
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label">{L::forms_labels_mrooms_places}</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">{if $mroom_data.places}{$mroom_data.places}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label">{L::forms_labels_mrooms_projector}</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                {if $mroom_data.rflags & $smarty.const.RM_PROJECTOR}<i class="fa fa-check text-success"></i>{else}<i class="fa fa-times text-muted"></i>{/if}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label">{L::forms_labels_mrooms_loudspeaker}</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    {if $mroom_data.rflags & $smarty.const.RM_LOUDSPEAKER}<i class="fa fa-check text-success"></i>{else}<i class="fa fa-times text-muted"></i>{/if}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label">{L::forms_labels_mrooms_microphone}</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    {if $mroom_data.rflags & $smarty.const.RM_MICROPHONE}<i class="fa fa-check text-success"></i>{else}<i class="fa fa-times text-muted"></i>{/if}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label">{L::forms_labels_mrooms_whiteboard}</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    {if $mroom_data.rflags & $smarty.const.RM_WHITEBOARD}<i class="fa fa-check text-success"></i>{else}<i class="fa fa-times text-muted"></i>{/if}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label">{L::forms_labels_mrooms_conference}</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    {if $mroom_data.rflags & $smarty.const.RM_CONFERENCE}<i class="fa fa-check text-success"></i>{else}<i class="fa fa-times text-muted"></i>{/if}
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label">{L::forms_labels_descr}</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    {if $mroom_data.descr}
                        {$mroom_data.descr}
                    {else}
                        <span class="text-muted">{L::text_not_specified}</span>
                    {/if}
                </p>
            </div>
        </div>
    </div>


</div>