<!--
Интраворк {$smarty.const.IW_VERSION} | http://intrawork.ru
Права защищены 2007-{$smarty.now|date_format:"%Y"} Исходный код  | http://www.src-code.ru
Сделано в России!
-->

<head>
    <title>{$controller_info.meta_title|strip_tags} :: Интраворк {$smarty.const.IW_VERSION}</title>

	<base href="http://{$smarty.server.HTTP_HOST}" />
    <link rel="icon" href="{$smarty.const.HOST_ROOT}resources/images/favicon.png" />

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{$controller_info.meta_description|strip_tags}">

	<script>
        window.paceOptions = {
			restartOnRequestAfter: true
		};
	</script>

<script src="resources/js/native/pace.min.js"></script>
{include file="helpers/include_resource_css.tpl" ar_resource=$ar_resource.head.css}
{include file="helpers/include_resource_js.tpl" ar_resource=$ar_resource.head.js}

    <script>
        Tinycon.setOptions({
            background: '#F89406'
        });
    </script>


</head>
