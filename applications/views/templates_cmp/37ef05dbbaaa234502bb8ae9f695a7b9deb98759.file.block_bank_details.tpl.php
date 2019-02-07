<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:06
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\view\block_bank_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84855c5a29da2028d6-71774923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37ef05dbbaaa234502bb8ae9f695a7b9deb98759' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\view\\block_bank_details.tpl',
      1 => 1449698800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84855c5a29da2028d6-71774923',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29da264363_45488144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29da264363_45488144')) {function content_5c5a29da264363_45488144($_smarty_tpl) {?>

<div class="form-horizontal form-clamped">
    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">Расчетный счет</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['bank_account']) {
echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_account'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">Корреспондентский счет</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['bank_offset_account']) {
echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_offset_account'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">Название банка</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['bank_name']) {
echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_name'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">ИНН</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['bank_inn']) {
echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_inn'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">КПП</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['bank_kpp']) {
echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_kpp'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">БИК</label>
        <div class="col-xs-7 col-sm-8 ">
            <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['bank_bik']) {
echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_bik'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 col-xs-5 control-label">Юридический адрес</label>
        <div class="col-xs-7 col-sm-8">
            <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal_address']) {
echo $_smarty_tpl->tpl_vars['contact_data']->value['legal_address'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
        </div>
    </div>

</div><?php }} ?>
