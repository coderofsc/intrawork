<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" id="fm-container">
            {foreach from=$ar_files.data item=file key=file_id}
                {include file="./item.tpl"}
            {/foreach}
        </div>
    </div>
</div>

