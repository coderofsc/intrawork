
{if $read}
    {if $clear}
        {m_demands::decode_priority($value)} ({$value})
    {else}
        <span class="label label-success">{m_demands::decode_priority($value)} ({$value})</span>
    {/if}

{elseif $options}
    <option {if $only && ((is_array($only) && !in_array(0, $only)) || (!is_array($only) && $only !== 0))}disabled{/if} value="0" {if (is_array($value) && in_array(0, $value)) || $value === 0 }selected=""{/if}>{L::modules_demands_priority_low} (0-100)</option>
    <option {if $only && ((is_array($only) && !in_array(100, $only)) || (!is_array($only) && $only != 100))}disabled{/if} value="100" {if (is_array($value) && in_array(100, $value)) || $value > 100 && $value <= 200}selected=""{/if}>{L::modules_demands_priority_mid} (100-200)</option>
    <option {if $only && ((is_array($only) && !in_array(200, $only)) || (!is_array($only) && $only != 200))}disabled{/if} value="200" {if (is_array($value) && in_array(200, $value)) || $value > 200 && $value <= 300}selected=""{/if}>{L::modules_demands_priority_hi} (200-300)</option>
{else}

    <input name="demand_data[priority]" id="demand_data_priority" value="{$value}" />

    <script>
        $().ready( function() {
            $("#demand_data_priority").ionRangeSlider({
                min: 1,
                max: 300,
                from: 100,
                grid: false,
                force_edges: true,

                prettify: function (num) {
                    var level = '';
                    if (num >= 200) {
                        level = '{L::modules_demands_priority_hi}';
                    } else if (num >= 100) {
                        level = '{L::modules_demands_priority_mid}';
                    } else {
                        level = '{L::modules_demands_priority_low}';
                    }

                    return level + ' (' + num + ')';
                }
            });
        });
    </script>
{/if}

