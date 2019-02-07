{*<div class="row">
    <div class="col-lg-4 col-sm-4 col-xs-12 text-center">
        {include file="contacts/view/block_avatar.tpl" contact_data=$object_data}
        <div class="clearfix"></div>
        <div class="space"></div>
    </div>
    <div class="col-lg-8 col-sm-8 col-xs-12">
        {include file="contacts/view/block_about.tpl" contact_data=$object_data}
    </div>
</div>
*}
{include file="contacts/view/wrap.tpl" contact_data=$object_data}