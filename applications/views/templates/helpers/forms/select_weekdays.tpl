<div class="row i-checks">
    <div class="col-sm-4">
        <label for="weekdays_1"><input {if $ar_days && in_array(1, $ar_days)}checked=""{/if} name="{$name}[]" value="1" type="checkbox" id="weekdays_1" /> Понедельник</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_2"><input {if $ar_days && in_array(2, $ar_days)}checked=""{/if} name="{$name}[]" value="2" type="checkbox" id="weekdays_2" /> Вторник</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_3"><input {if $ar_days && in_array(3, $ar_days)}checked=""{/if} name="{$name}[]" value="3" type="checkbox" id="weekdays_3" /> Среда</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_4"><input {if $ar_days && in_array(4, $ar_days)}checked=""{/if} name="{$name}[]" value="4" type="checkbox" id="weekdays_4" /> Четверг</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_5"><input {if $ar_days && in_array(5, $ar_days)}checked=""{/if} name="{$name}[]" value="5" type="checkbox" id="weekdays_5" /> Пятница</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_6"><input {if $ar_days && in_array(6, $ar_days)}checked=""{/if} name="{$name}[]" value="6" type="checkbox" id="weekdays_6" /> Суббота</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_7"><input {if $ar_days && in_array(7, $ar_days)}checked=""{/if} name="{$name}[]" value="7" type="checkbox" id="weekdays_7" /> Воскресенье</label>
    </div>
</div>
