{include file="main/title.tpl"}

<div class="container-fluid">

    {if $record_limit}
    <div class="alert alert-danger">
        <h4>Достигнут лимит почтовых ботов</h4>
        <p>Установлено максимальное количество ботов: {$config->mailbots_limit}</p>
    </div>
    {else}

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="row">
            <div class="col-sm-8">
                {include file="./general.tpl"}
            </div>
            <div class="col-sm-4">
                <div class="alert alert-warning"><h4>{L::modules_mailbots_morph_one|mb_ucfirst}</h4>
                    {L::modules_mailbots_alerts_abstract}
                </div>
            </div>
        </div>

        <div id="mailbox-setup" {if $mb_data && !$mb_data.status}style="display:none"{/if}>
            <legend>{L::forms_legends_mailbots_mailbox}</legend>
            <div class="row">
                <div class="col-sm-8">
                    {include file="./mailbox.tpl"}
                </div>
                <div class="col-sm-4">
                    <div class="alert alert-info">
                        <h4>{L::forms_legends_mailbots_mailbox}</h4>
                        {L::modules_mailbots_alerts_check_connect}
                    </div>
                </div>
            </div>
        </div>

        {include file="helpers/forms/actions.tpl" update=isset($mb_data.id)}
    </form>
    {/if}
</div>

<script>
    $("#mb_data_status").on("change", function() {
        $("#mailbox-setup").slideToggle();
    });
</script>