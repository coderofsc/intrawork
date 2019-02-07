<!DOCTYPE html>
<html lang="en">
{include file="main/head.tpl"}

<body class="bg-muted">

    {$controller_data}

    {*<link rel="stylesheet" href="resources/js/icheck/css/square/blue.css">
    <script src="resources/js/icheck/js/icheck.min.js"></script>*}

    {include file="helpers/include_resource_css.tpl" ar_resource=$ar_resource.foot.css}
    {include file="helpers/include_resource_js.tpl" ar_resource=$ar_resource.foot.js}

</body>

</html>