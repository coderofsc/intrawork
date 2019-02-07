<ul class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab">{L::tabs_general}</a></li>
    {if $contact_data.legal == $smarty.const.LEGAL_PERSON}<li class="legal-entity"><a href="#bank-details" data-toggle="tab">{L::tabs_bank_details}</a></li>{/if}
    <li><a href="#extra" data-toggle="tab">{L::tabs_extra}</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane clamped active" id="general">
        {include file="contacts/view/block_general.tpl"}
    </div>
    {if $contact_data.legal == $smarty.const.LEGAL_PERSON}
    <div class="tab-pane clamped" id="bank-details">
        {include file="contacts/view/block_bank_details.tpl"}
    </div>
    {/if}
    <div class="tab-pane clamped" id="extra">
        {include file="contacts/view/block_extra.tpl"}
    </div>

</div>

