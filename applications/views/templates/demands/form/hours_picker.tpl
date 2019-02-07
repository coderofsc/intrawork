{if $cuser_data.access_data.limited_setting}
    <p class="form-control-static">
        <span class="text-muted">{L::text_unknown|mb_ucfirst}</span>
    </p>
{else}
    <div>
        <input type="hidden" name="demand_data[required_time]" value="{$demand_data.required_time|floatval}" />
    </div>

    <div class="input-group">
        <input id="demand_data_required_time" value="{$demand_data.required_time/$smarty.const.TIME_HOUR}" type="text" class="form-control">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-wauto pull-right" role="menu">
                <li><a data-add="0.25" href="#">+15 {L::dates_min_morph_five}</a></li>
                <li><a data-add="0.5" href="#">+30 {L::dates_min_morph_five}</a></li>
                <li><a data-add="1" href="#">+1 {L::dates_hour_morph_one}</a></li>
                <li><a data-add="2" href="#">+2 {L::dates_hour_morph_two}</a></li>
                <li><a data-add="3" href="#">+3 {L::dates_hour_morph_two}</a></li>
                <li><a data-add="4" href="#">+4 {L::dates_hour_morph_two}</a></li>
                <li><a data-add="5" href="#">+5 {L::dates_hour_morph_five}</a></li>
            </ul>
        </div>
        {if !$demand_data.id}
            <span class="input-group-addon">
                <input type="checkbox" class="storage-data" name="storage_field[]" value="required_time" {if in_array("required_time", $storage_field)}checked=""{/if}>
            </span>
        {/if}
    </div>


    {literal}
    <script>
        $(document).ready(function() {

            $("#demand_data_required_time").TouchSpin({
                prefix: "{/literal}{L::dates_hours}{literal}",
                min: {/literal}{($demand_data.exec_time/3600)|floatval|ceil}{literal},
                max:1000,
                step: 0.1,
                decimals: 2,
                boostat: 5

            }).on("change", function() {
                var value       = $(this).val();
                var value_sec   = value * 3600;

                $(this).closest(".form-group").find("input[name='demand_data[required_time]']").val(value_sec);

            }).parent().find(".dropdown-menu li a").on("click", function() {
                var $spin = $("#demand_data_required_time");
                var add_val = parseFloat($(this).data("add"));
                var cur_val = parseFloat($spin.val());
                $spin.val(cur_val+add_val).change();

                $(this).closest(".dropdown-menu").dropdown('toggle');

                return false;
            });
        });
    </script>
    {/literal}
{/if}