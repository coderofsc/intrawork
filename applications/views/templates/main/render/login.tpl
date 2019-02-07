<!DOCTYPE html>
<html lang="en">
{include file="main/head.tpl"}

<body {*class="bg-muted"*}>

    <link rel="stylesheet" href="resources/css/login.css">
    <link rel="stylesheet" href="resources/css/animate.css">

    <script type="text/javascript" src="resources/js/intrawork.login.js"></script>

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-lg-12">
                <table id="table-container" width="100%" cellpadding="40px" cellspacing="40px" bgcolor="yellow">
                    <tr>
                        <td width="50%" class="text">
                            <h2 class="font-bold">{L::text_welcome} {$smarty.const.IW_VERSION}</h2>

                            {L::modules_login_text_leader}

                            <div class="space"></div>
                            <div class="space"></div>

                            <a href="http://www.src-code.ru"><img src="resources/images/src-code-logo-w.png" alt="Исходный Код" /></a>
                        </td>
                        <td>
                            <div class="ibox-content">

                                {include file="helpers/alerts.tpl"}
                                <div class="space"></div>
                                {$controller_data}

                                <p class="text-muted text-center">
                                    <small>{L::modules_login_text_header_create_account}</small>
                                </p>
                                <a class="btn btn-sm btn-white btn-block" href="http://intrawork.ru/establish/">{L::modules_login_text_create_account}</a>
                                <div class="space"></div>
                                <p class="text-center">
                                    <small>{L::meta_title}</small>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>

            </div>

            {*
            <div class="col-xs-12 col-sm-6 col-md-6 text" >
                <h2 class="font-bold">{L::text_welcome} {$smarty.const.IW_VERSION}</h2>

                {L::modules_login_text_leader}

                <div class="space"></div>
                <div class="space"></div>

                <a href="http://www.src-code.ru"><img src="resources/images/src-code-logo-w.png" alt="Исходный Код" /></a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="ibox-content">

                    {include file="helpers/alerts.tpl"}
                    <div class="space"></div>
                    {$controller_data}

                    <p class="text-muted text-center">
                        <small>{L::modules_login_text_header_create_account}</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="http://intrawork.ru/establish/">{L::modules_login_text_create_account}</a>
                    <div class="space"></div>
                    <p class="text-center">
                        <small>{L::meta_title}</small>
                    </p>
                </div>
            </div>
            *}
        </div>
        {*<hr/>*}
        <div class="row">
            <div class="col-md-6">
                {*<a href="http://www.src-code.ru"><img src="resources/images/src-code-logo.png" alt="Исходный Код" /></a>*}
            </div>
            <div class="col-md-6 text-right text">
                <div class="small">© 2007-{$smarty.now|date_format:"%Y"}</div>
                <div class="small">{L::modules_login_text_made_in}</div>
            </div>
        </div>
    </div>

    {include file="helpers/include_resource_css.tpl" ar_resource=$ar_resource.foot.css}
    {include file="helpers/include_resource_js.tpl" ar_resource=$ar_resource.foot.js}

</body>

</html>