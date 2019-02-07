{include file="main/title.tpl"}

<div class="container-fluid">

	<form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">{L::tabs_general}</a></li>
            <li class="legal-entity {if $contact_data.legal != $smarty.const.LEGAL_PERSON}hidden{/if}"><a href="#bank-details" data-toggle="tab">{L::tabs_bank_details}</a></li>
            <li><a href="#contacts" data-toggle="tab">{L::tabs_contacts}</a></li>
            <li><a href="#extra" data-toggle="tab">{L::tabs_extra}</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="general">
                {include file="contacts/form/block_general.tpl"}
            </div>
            <div class="tab-pane legal-entity {if $contact_data.legal != $smarty.const.LEGAL_PERSON}hidden{/if}" id="bank-details">
                {include file="contacts/form/block_bank_details.tpl"}
            </div>
            <div class="tab-pane" id="contacts">
                {include file="contacts/form/block_contacts.tpl"}
            </div>
            <div class="tab-pane" id="extra">
                {include file="contacts/form/block_extra.tpl"}
            </div>
        </div>

        {include file="helpers/forms/actions.tpl" update=isset($contact_data.id)}
    </form>
</div>



<script>
    $("#contact_data_legal").on("change", function() {
        $(".legal-entity").toggleClass('hidden');
    });
</script>