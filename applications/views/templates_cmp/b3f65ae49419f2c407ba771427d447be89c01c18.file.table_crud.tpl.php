<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:20:20
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\roles\form\table_crud.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235225c5aed24e5a069-07011957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3f65ae49419f2c407ba771427d447be89c01c18' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\roles\\form\\table_crud.tpl',
      1 => 1447934668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235225c5aed24e5a069-07011957',
  'function' => 
  array (
    'crud_level' => 
    array (
      'parameter' => 
      array (
        'ar_destinations' => 
        array (
        ),
        'nested' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'ar_destinations' => 0,
    'name' => 0,
    'hide_read' => 0,
    'readonly' => 0,
    'exists' => 0,
    'dest_id' => 0,
    'ar_crud' => 0,
    'dest' => 0,
    'item' => 0,
    'nested' => 0,
    'crud_func' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aed250bdac7_99836416',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aed250bdac7_99836416')) {function content_5c5aed250bdac7_99836416($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><?php if ($_smarty_tpl->tpl_vars['ar_destinations']->value) {?>
<table class="table table-hover table-sticky-head table-crud" id="table-crud<?php if ($_smarty_tpl->tpl_vars['name']->value) {?>-<?php echo $_smarty_tpl->tpl_vars['name']->value;
}?>">
    <colgroup>
        <col width="*" />
        <?php if (!$_smarty_tpl->tpl_vars['hide_read']->value) {?><col width="10%" /><?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['readonly']->value) {?><col width="10%" /><?php }?>
        <col width="10%" />
        <col width="10%" />
        <col width="10%" />
    </colgroup>

    <thead>
    <tr>
        <th>
            <?php if ($_smarty_tpl->tpl_vars['name']->value=="module") {?>Модуль
            <?php } elseif ($_smarty_tpl->tpl_vars['name']->value=="categories") {
echo smarty_modifier_mb_ucfirst(L::modules_categories_morph_one);?>

            <?php } elseif ($_smarty_tpl->tpl_vars['name']->value=="roles") {
echo smarty_modifier_mb_ucfirst(L::modules_roles_morph_one);?>

            <?php } else {
echo $_smarty_tpl->tpl_vars['name']->value;?>

            <?php }?>
        </th>
        <?php if (!$_smarty_tpl->tpl_vars['readonly']->value) {?><th class="text-center">Все</th><?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['hide_read']->value) {?><th class="text-center"><?php echo L::crud_read;?>
</th><?php }?>
        <th class="text-center"><?php echo L::crud_update;?>
</th>
        <th class="text-center"><?php echo L::crud_create;?>
</th>
        <th class="text-center"><?php echo L::crud_delete;?>
</th>
    </tr>
    </thead>
    <tbody>
	<?php if (!$_smarty_tpl->tpl_vars['readonly']->value) {?>
    <tr data-tt-id="0">
        <td>&nbsp;</td>
        <?php if (!$_smarty_tpl->tpl_vars['hide_read']->value) {?><td class="text-center"><input type="checkbox" class="i-checks-red" /></td><?php }?>
        <td class="text-center"><input type="checkbox" class="i-checks-red" /></td>
        <td class="text-center"><input type="checkbox" class="i-checks-red" /></td>
        <td class="text-center"><input type="checkbox" class="i-checks-red" /></td>
        <td class="text-center"><input type="checkbox" class="i-checks-red" /></td>
    </tr>
	<?php }?>

    <?php if (!function_exists('smarty_template_function_crud_level')) {
    function smarty_template_function_crud_level($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['crud_level']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

        <?php  $_smarty_tpl->tpl_vars['dest'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dest']->_loop = false;
 $_smarty_tpl->tpl_vars['dest_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_destinations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dest']->key => $_smarty_tpl->tpl_vars['dest']->value) {
$_smarty_tpl->tpl_vars['dest']->_loop = true;
 $_smarty_tpl->tpl_vars['dest_id']->value = $_smarty_tpl->tpl_vars['dest']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['exists']->value&&!$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]) {
continue 1;
}?>
            <tr data-tt-id="<?php echo $_smarty_tpl->tpl_vars['dest_id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['dest']->value['parent_id']) {?>data-tt-parent-id="<?php echo $_smarty_tpl->tpl_vars['dest']->value['parent_id'];?>
"<?php }?> class="<?php if ($_smarty_tpl->tpl_vars['dest_id']->value==0) {?>zero-item<?php }?> <?php if ($_smarty_tpl->tpl_vars['dest']->value['children']&&$_smarty_tpl->tpl_vars['dest']->value['visible_only']) {?>expand<?php }?>">
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['dest']->value['children']&&$_smarty_tpl->tpl_vars['dest']->value['visible_only']) {?>
                        <span class="text-muted"><?php echo $_smarty_tpl->tpl_vars['dest']->value['name'];?>
</span>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['dest']->value['name'];?>

                    <?php }?>

                </td>

                <?php if ($_smarty_tpl->tpl_vars['readonly']->value) {?>
                    <?php if (!$_smarty_tpl->tpl_vars['hide_read']->value) {?>
                    <td class="text-center">
                        <i class="fa fa-<?php if ($_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&&$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&m_roles::CRUD_R) {?>check text-success<?php } else { ?>times text-muted<?php }?>"></i>
                    </td>
                    <?php }?>
                    <td class="text-center">
                        <i class="fa fa-<?php if ($_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&&$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&m_roles::CRUD_U) {?>check text-success<?php } else { ?>times text-muted<?php }?>"></i>
                    </td>
                    <td class="text-center">
                        <i class="fa fa-<?php if ($_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&&$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&m_roles::CRUD_C) {?>check text-success<?php } else { ?>times text-muted<?php }?>"></i>
                    </td>
                    <td class="text-center">
                        <i class="fa fa-<?php if ($_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&&$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&m_roles::CRUD_D) {?>check text-success<?php } else { ?>times text-muted<?php }?>"></i>
                    </td>
                <?php } else { ?>
                    <td class="text-center">
                        <input type="checkbox" class="i-checks-red" name="cat[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['bit'];?>
" />
                    </td>
                    <?php if (!$_smarty_tpl->tpl_vars['hide_read']->value) {?>
                    <td class="text-center">
                        <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['dest']->value['possible_access_mode']&&!in_array(m_roles::CRUD_R,$_smarty_tpl->tpl_vars['dest']->value['possible_access_mode'])) {?>checked disabled<?php } elseif ($_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&&$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&m_roles::CRUD_R) {?>checked=""<?php }?> class="i-checks" name="crud<?php if ($_smarty_tpl->tpl_vars['name']->value) {?>_<?php echo $_smarty_tpl->tpl_vars['name']->value;
}?>[<?php echo $_smarty_tpl->tpl_vars['dest_id']->value;?>
][]"   value="<?php echo m_roles::CRUD_R;?>
" />
                    </td>
                    <?php }?>
                    <td class="text-center">
                        <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&&$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&m_roles::CRUD_U) {?>checked=""<?php }?> class="i-checks" name="crud<?php if ($_smarty_tpl->tpl_vars['name']->value) {?>_<?php echo $_smarty_tpl->tpl_vars['name']->value;
}?>[<?php echo $_smarty_tpl->tpl_vars['dest_id']->value;?>
][]" value="<?php echo m_roles::CRUD_U;?>
" />
                    </td>
                    <td class="text-center">
                        <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&&$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&m_roles::CRUD_C) {?>checked=""<?php }?> class="i-checks" name="crud<?php if ($_smarty_tpl->tpl_vars['name']->value) {?>_<?php echo $_smarty_tpl->tpl_vars['name']->value;
}?>[<?php echo $_smarty_tpl->tpl_vars['dest_id']->value;?>
][]" value="<?php echo m_roles::CRUD_C;?>
" />
                    </td>
                    <td class="text-center">
                        <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&&$_smarty_tpl->tpl_vars['ar_crud']->value[$_smarty_tpl->tpl_vars['dest_id']->value]&m_roles::CRUD_D) {?>checked=""<?php }?> class="i-checks" name="crud<?php if ($_smarty_tpl->tpl_vars['name']->value) {?>_<?php echo $_smarty_tpl->tpl_vars['name']->value;
}?>[<?php echo $_smarty_tpl->tpl_vars['dest_id']->value;?>
][]" value="<?php echo m_roles::CRUD_D;?>
" />
                    </td>
                <?php }?>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['dest']->value['children']) {?>
                <?php smarty_template_function_crud_level($_smarty_tpl,array('ar_destinations'=>$_smarty_tpl->tpl_vars['dest']->value['children'],'nested'=>$_smarty_tpl->tpl_vars['nested']->value+1));?>

            <?php }?>

        <?php } ?>
    <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


    <?php smarty_template_function_crud_level($_smarty_tpl,array('ar_destinations'=>$_smarty_tpl->tpl_vars['ar_destinations']->value,'nested'=>0));?>


    </tbody>
</table>

    <?php if ($_smarty_tpl->tpl_vars['nested']->value) {?>
        <button class="btn btn-link" id="btn-table-crud-categories-expand"><i class="fa fa-expand"></i> <?php echo L::text_expand_all;?>
</button>
        <button class="btn btn-link" id="btn-table-crud-categories-collapse"><i class="fa fa-compress"></i> <?php echo L::text_collapse_all;?>
</button>

        <?php echo '<script'; ?>
>
            var $e_treetable = $("#table-crud-categories");
            $e_treetable.treetable({
                indent: 34,
                expandable: true,
                expanderTemplate: "<a class='btn btn-sm btn-default' href='#'><i class='fa'></a>"
            });

            function expand() {
                $e_treetable.find("tr.expand").each(function () {
                    var ttId = $(this).data('tt-id') || 0;
                    $e_treetable.treetable("expandNode", ttId);
                });
            }

            $().ready( function() {
                if (CoreIW.layout_init) {
                    expand();
                } else {
                    $('body').bind('init.layout', function(){
                        expand();
                    }).bind('previewLoaded.content', function(){
                        expand();
                    });
                }
            });


            //Expanded

            $("#btn-table-crud-categories-expand").on("click", function() {
                $('#table-crud-categories').treetable('expandAll');
                return false;
            });

            $("#btn-table-crud-categories-collapse").on("click", function() {
                $('#table-crud-categories').treetable('collapseAll');
                return false;
            });


        <?php echo '</script'; ?>
>
    <?php }?>


<?php echo '<script'; ?>
>

    <?php if (!$_smarty_tpl->tpl_vars['crud_func']->value) {?>

        function table_crud_init($el, tree) {
            $el.find("tbody tr input:checkbox").on('ifChanged', function(event){
                var $tr = $(this).closest("tr");

                if ($tr.hasClass('zero-item')) {
                    return true;
                }

                var col_index       = $(this).closest("td").index();
                var is_checked      = $(this).is(":checked");
                var icheck_status   = (is_checked)?'check':'uncheck';
                var ttId = $tr.data('tt-id') || 0;

                if (tree) {
                    $el.treetable("expandNode", ttId);
                }

                $(this).closest('table').find('tbody '+((ttId)?'tr[data-tt-parent-id='+ttId+']':'tr:not([data-tt-parent-id])')).find('td:eq('+col_index+') input:checkbox:enabled').iCheck(icheck_status);
            });

            $el.find('tbody tr').find('td:eq(1) input:checkbox:enabled').on('ifChanged', function(event){
                var is_checked      = $(this).is(":checked");
                var icheck_status   = (is_checked)?'check':'uncheck';

                $(this).closest('tr').find('input:checkbox:enabled').iCheck(icheck_status);
            });
        }
        <?php $_smarty_tpl->tpl_vars["crud_func"] = new Smarty_variable(true, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars["crud_func"] = clone $_smarty_tpl->tpl_vars["crud_func"];?>
    <?php }?>

    table_crud_init($("#table-crud<?php if ($_smarty_tpl->tpl_vars['name']->value) {?>-<?php echo $_smarty_tpl->tpl_vars['name']->value;
}?>"), <?php echo intval($_smarty_tpl->tpl_vars['nested']->value);?>
);

<?php echo '</script'; ?>
>
<?php } else { ?>
    <div class="alert alert-default">
        Нет доступных
        <?php if ($_smarty_tpl->tpl_vars['name']->value=="module") {?>модулей
        <?php } elseif ($_smarty_tpl->tpl_vars['name']->value=="categories") {?>категорий
        <?php } elseif ($_smarty_tpl->tpl_vars['name']->value=="roles") {?>ролей
        <?php } else {
echo $_smarty_tpl->tpl_vars['name']->value;?>

        <?php }?>

    </div>
<?php }?><?php }} ?>
