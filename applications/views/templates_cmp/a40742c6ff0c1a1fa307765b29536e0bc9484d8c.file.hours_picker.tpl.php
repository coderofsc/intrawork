<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\form\hours_picker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190975c5a2665697fb8-04771983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a40742c6ff0c1a1fa307765b29536e0bc9484d8c' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\form\\hours_picker.tpl',
      1 => 1450905918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190975c5a2665697fb8-04771983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cuser_data' => 0,
    'demand_data' => 0,
    'storage_field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a26656edec0_52183277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a26656edec0_52183277')) {function content_5c5a26656edec0_52183277($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
    <p class="form-control-static">
        <span class="text-muted"><?php echo smarty_modifier_mb_ucfirst(L::text_unknown);?>
</span>
    </p>
<?php } else { ?>
    <div>
        <input type="hidden" name="demand_data[required_time]" value="<?php echo floatval($_smarty_tpl->tpl_vars['demand_data']->value['required_time']);?>
" />
    </div>

    <div class="input-group">
        <input id="demand_data_required_time" value="<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['required_time']/@constant('TIME_HOUR');?>
" type="text" class="form-control">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-wauto pull-right" role="menu">
                <li><a data-add="0.25" href="#">+15 <?php echo L::dates_min_morph_five;?>
</a></li>
                <li><a data-add="0.5" href="#">+30 <?php echo L::dates_min_morph_five;?>
</a></li>
                <li><a data-add="1" href="#">+1 <?php echo L::dates_hour_morph_one;?>
</a></li>
                <li><a data-add="2" href="#">+2 <?php echo L::dates_hour_morph_two;?>
</a></li>
                <li><a data-add="3" href="#">+3 <?php echo L::dates_hour_morph_two;?>
</a></li>
                <li><a data-add="4" href="#">+4 <?php echo L::dates_hour_morph_two;?>
</a></li>
                <li><a data-add="5" href="#">+5 <?php echo L::dates_hour_morph_five;?>
</a></li>
            </ul>
        </div>
        <?php if (!$_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
            <span class="input-group-addon">
                <input type="checkbox" class="storage-data" name="storage_field[]" value="required_time" <?php if (in_array("required_time",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
            </span>
        <?php }?>
    </div>


    
    <?php echo '<script'; ?>
>
        $(document).ready(function() {

            $("#demand_data_required_time").TouchSpin({
                prefix: "<?php echo L::dates_hours;?>
",
                min: <?php echo ceil(floatval(($_smarty_tpl->tpl_vars['demand_data']->value['exec_time']/3600)));?>
,
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
    <?php echo '</script'; ?>
>
    
<?php }?><?php }} ?>
