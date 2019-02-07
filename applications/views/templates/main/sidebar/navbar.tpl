<nav class="navbar navbar-inverse clamped" role="navigation">
	<div class="container-fluid ">
		<div class="navbar-header">
			<a class="navbar-brand" href="{$smarty.const.HOST_ROOT}">
				<img src="{$smarty.const.HOST_ROOT}resources/images/intrawork-logo.png" alt="{L::intrawork}" title="{L::meta_title}" />
			</a>
		</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
                {if $controller_name == "demands_view" || $controller_name == "demands"}
                <li class="check-message {*hidden*}" title="Фоновая проверка новых сообщений в заявке">
                    <a href="#">
                        <i class="fa fa-fw fa-refresh"></i>
                    </a>
                </li>
                {/if}
				<li {if $controller_name == "demands" && $conditions}class="active"{/if}>
					<a data-toggle="modal" href="#modal-remote" data-remote="demands/search/{if $controller_name == "demands"}{if $conditions}?{$conditions|http_build_query:"cnd"}{/if}{if $sort}{if $conditions}&{else}?{/if}{$sort|http_build_query:"sort"}{/if}{/if}"><i class="fa fa-search"></i></a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
					<ul class="dropdown-menu">

                        {foreach from=cls_modules::$ar_modules key=module_id item=module}
                            {if $module_id|access:m_roles::CRUD_C && in_array(m_roles::CRUD_C,cls_modules::$ar_modules[$module_id].possible_access_mode) && !isset(cls_modules::$ar_modules[$module_id].inside)}
                                <li><a href="{$module.alias}/create/" class="selected">{$module.morph.0|mb_ucfirst}</a></li>
                            {/if}
                        {/foreach}
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>
