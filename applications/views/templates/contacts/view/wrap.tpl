<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                {include file="contacts/view/block_avatar.tpl"}
                <div class="clearfix"></div>
                <div class="space"></div>
            </div>
            {*<div class="col-lg-12 col-sm-8 col-xs-12">
                {include file="contacts/view/block_about.tpl"}
            </div>*}
        </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
        {include file="contacts/view/block_about.tpl"}

        <div class="h3">{L::modules_contacts_text_headers_last_demands}</div>
        {include file="demands/list.tpl" ar_demands=$ar_demands_last module_id=cls_modules::MODULE_DEMANDS denied_delete=true collapsed=true}
    </div>
</div>
