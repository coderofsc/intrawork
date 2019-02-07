<div class="form-group">
    <label for="user_data_lang" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_users_lang}</label>
    <div class="col-sm-2 col-xs-4">
        <select name="user_data[lang]" id="user_data_lang" class="form-control selectpicker">
            <option {if $user_data.lang == "ru"}selected=""{/if} value="ru">Русский</option>
            <option {if $user_data.lang == "ua"}selected=""{/if} value="ua">Український</option>
            <option {if $user_data.lang == "en"}selected=""{/if} value="en">English</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="user_data_price_per_hour" class="col-sm-2 col-xs-3 control-label">Стоимость часа работы</label>
    <div class="col-sm-2 col-xs-9">
        <input type="text" class="form-control" name="user_data[price_per_hour]" id="user_data_price_per_hour" value="{$user_data.price_per_hour}">
    </div>
</div>


<div class="form-group">
    <label for="user_data_descr" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_descr}</label>
    <div class="col-sm-10 col-xs-9">
        <textarea class="form-control" rows="7" name="user_data[descr]" id="user_data_descr">{$user_data.descr}</textarea>
    </div>
</div>
