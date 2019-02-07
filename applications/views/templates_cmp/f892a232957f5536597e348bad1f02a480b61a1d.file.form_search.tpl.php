<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\navbar\form_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77765c5a431272bf62-29968193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f892a232957f5536597e348bad1f02a480b61a1d' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\navbar\\form_search.tpl',
      1 => 1457393124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77765c5a431272bf62-29968193',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_name' => 0,
    'conditions' => 0,
    'sort' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4312756ef6_90287467',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4312756ef6_90287467')) {function content_5c5a4312756ef6_90287467($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><style>
    #cnd_search {
        width: 80px;
        -webkit-transition: width 0.5s ease-in-out;
        -moz-transition:width 0.5s ease-in-out;
        -o-transition: width 0.5s ease-in-out;
        transition: width 0.5s ease-in-out;
        position:absolute;
    }

    #cnd_search:focus{
        width: 250px;
    }

    #navbar-search-form {
        padding-right: 0;
    }
</style>

<form id="navbar-search-form" action="search/" class=" navbar-form navbar-left" role="search" method="get">
    
    <div class="input-group">
        <input id="cnd_search" type="text" class="form-control" name="text" placeholder="<?php echo L::navbar_global_search;?>
...">
        <span class="input-group-btn">
            
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
            <button class="btn-search-collapse btn btn-default" style="display: none;" onclick="$('#cnd_search').blur(); return false;"><i class="fa fa-times"></i></button>
        </span>
    </div>
</form>

<?php echo '<script'; ?>
>
    $('body').bind('init.layout', function(event){

        $("#cnd_search").on("focus", function() {
            $("#navbar-search-form").find(".btn-search-collapse").show();
            $("#navbar-search-form").find("button[type=submit]").toggleClass("btn-default btn-success");
            $("#navbar-top .navbar-nav").stop().fadeOut();
        }).on("blur", function() {
            $("#navbar-search-form").find(".btn-search-collapse").hide();
            $("#navbar-search-form").find("button[type=submit]").toggleClass("btn-default btn-success");
            $("#navbar-top .navbar-nav").stop().fadeIn();
        });

        function get_qs_source() {
            return new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'demands/search/%QUERY.json',
                    wildcard: '%QUERY'
                }
            });
        }

        $("#cnd_search").typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 3
                },
                {
                    name: 'qs-demands',
                    limit: 5,
                    display: 'value',
                    source: get_qs_source(),
                    
                    templates: {
                        header: '<h3 class="league-name">Заявки</h3>',
                        suggestion: function(data) {
                            return '<div>'+data.value+'</div>';
                        }
                    }
                    
                }
        );


        $("#cnd_search").bind('typeahead:selected', function(obj, datum, name) {
            //console.log(datum);
            <?php if ($_smarty_tpl->tpl_vars['controller_name']->value=="demands") {?>
            DemandIW.find(datum.id, "<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
", datum.link);
            <?php } else { ?>
            location.href = datum.link;
            <?php }?>
        });

    });

<?php echo '</script'; ?>
>
<?php }} ?>
