{include file="main/title.tpl"}

<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general {if $ar_errors_form.name}has-error{/if}">
            <label for="mroom_data_name" class="col-sm-2 control-label">{L::forms_labels_name}</label>
            <div class="col-sm-6">
                <input type="text" data-rule-required="true" class="form-control" name="mroom_data[name]" id="mroom_data_name" placeholder="{$mroom_data.name}" value="{$mroom_data.name}">
            </div>
        </div>

        <div class="form-group {if $ar_errors_form.bgcolor}has-error{/if}">
            <label for="mroom_data_bgcolor" class="col-sm-2 control-label">{L::forms_labels_mrooms_color}</label>
            <div class="col-sm-2">
                <div class="input-group colorselect">
                    <input type="text" value="{if $mroom_data.bgcolor}{$mroom_data.bgcolor}{else}{$rand_color}{/if}" class="form-control" name="mroom_data[bgcolor]" id="mroom_data_bgcolor"/>
                    <span class="input-group-addon"><i></i></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="mroom_data_places" class="col-sm-2 control-label">{L::forms_labels_mrooms_places}</label>
            <div class="col-sm-2">
                <input type="text" class="form-control touch-spin" value="{$mroom_data.places}" name="mroom_data[places]" id="mroom_data_places">
            </div>
        </div>

        <div class="form-group clamped-margin-bottom">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" {if $mroom_data.rflags & $smarty.const.RM_PROJECTOR}checked{/if} value="{$smarty.const.RM_PROJECTOR}"> {L::forms_labels_mrooms_projector}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group clamped-margin-bottom">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" {if $mroom_data.rflags & $smarty.const.RM_LOUDSPEAKER}checked{/if} value="{$smarty.const.RM_LOUDSPEAKER}"> {L::forms_labels_mrooms_loudspeaker}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group clamped-margin-bottom">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" {if $mroom_data.rflags & $smarty.const.RM_MICROPHONE}checked{/if} value="{$smarty.const.RM_MICROPHONE}"> {L::forms_labels_mrooms_microphone}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group clamped-margin-bottom">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" {if $mroom_data.rflags & $smarty.const.RM_WHITEBOARD}checked{/if} value="{$smarty.const.RM_WHITEBOARD}"> {L::forms_labels_mrooms_whiteboard}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" {if $mroom_data.rflags & $smarty.const.RM_CONFERENCE}checked{/if} value="{$smarty.const.RM_CONFERENCE}"> {L::forms_labels_mrooms_conference}
                    </label>
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="mroom_data_descr" class="col-sm-2 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="mroom_data[descr]" id="mroom_data_descr">{$mroom_data.descr}</textarea>
            </div>
        </div>

        {include file="helpers/forms/actions.tpl" update=isset($mroom_data.id)}
    </form>


</div>