{*
\{(\$contact_data\.[a-zA-Z_]*)\}
*}

<div class="form-horizontal form-clamped">
    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">Расчетный счет</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static">{if $contact_data.bank_account}{$contact_data.bank_account}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">Корреспондентский счет</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static">{if $contact_data.bank_offset_account}{$contact_data.bank_offset_account}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">Название банка</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static">{if $contact_data.bank_name}{$contact_data.bank_name}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">ИНН</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static">{if $contact_data.bank_inn}{$contact_data.bank_inn}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">КПП</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static">{if $contact_data.bank_kpp}{$contact_data.bank_kpp}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">БИК</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static">{if $contact_data.bank_bik}{$contact_data.bank_bik}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">Юридический адрес</label>
        <div class="col-xs-7 col-sm-8">
            <p class="form-control-static">{if $contact_data.legal_address}{$contact_data.legal_address}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
        </div>
    </div>

</div>