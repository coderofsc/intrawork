<div class="form-actions form-group">
    <div class="col-sm-offset-2 col-xs-offset-3 col-sm-10 col-xs-9">
        <button type="submit" name="save" class="btn btn-primary">{if !$update}<i class="fa fa-plus"></i> {L::actions_create}{else}<i class="fa fa-save"></i> {L::actions_save}{/if} {$controller_info.module.morph.3}</button>{if !isset($next) || $next==true} и {include file="helpers/forms/next_actions.tpl" module=$controller_info.module}{/if}
    </div>
</div>
