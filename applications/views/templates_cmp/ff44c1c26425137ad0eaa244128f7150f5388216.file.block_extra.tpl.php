<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:13:02
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\users\form\block_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:272325c5add5e6d44a4-47108275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff44c1c26425137ad0eaa244128f7150f5388216' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\users\\form\\block_extra.tpl',
      1 => 1441246078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272325c5add5e6d44a4-47108275',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5add5e70afa3_62318987',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5add5e70afa3_62318987')) {function content_5c5add5e70afa3_62318987($_smarty_tpl) {?><div class="form-group">
    <label for="user_data_lang" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_users_lang;?>
</label>
    <div class="col-sm-2 col-xs-4">
        <select name="user_data[lang]" id="user_data_lang" class="form-control selectpicker">
            <option <?php if ($_smarty_tpl->tpl_vars['user_data']->value['lang']=="ru") {?>selected=""<?php }?> value="ru">Русский</option>
            <option <?php if ($_smarty_tpl->tpl_vars['user_data']->value['lang']=="ua") {?>selected=""<?php }?> value="ua">Український</option>
            <option <?php if ($_smarty_tpl->tpl_vars['user_data']->value['lang']=="en") {?>selected=""<?php }?> value="en">English</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="user_data_price_per_hour" class="col-sm-2 col-xs-3 control-label">Стоимость часа работы</label>
    <div class="col-sm-2 col-xs-9">
        <input type="text" class="form-control" name="user_data[price_per_hour]" id="user_data_price_per_hour" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['price_per_hour'];?>
">
    </div>
</div>


<div class="form-group">
    <label for="user_data_descr" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_descr;?>
</label>
    <div class="col-sm-10 col-xs-9">
        <textarea class="form-control" rows="7" name="user_data[descr]" id="user_data_descr"><?php echo $_smarty_tpl->tpl_vars['user_data']->value['descr'];?>
</textarea>
    </div>
</div>
<?php }} ?>
