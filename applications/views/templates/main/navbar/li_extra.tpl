<li class="dropdown border-left extra-nav">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i>{* <b class="caret"></b>*}</a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li>
            <a href="#" data-toggle="fullscreen">
                {*<em class="fa fa-expand fa-fw"></em> *}Во весь экран
            </a>
        </li>
        <li>
            <a href="#"  id="start-tour">
                {*<em class="fa fa-rocket"></em><span class="hidden-xs"> {L::navbar_tour}</span>*}
                {L::navbar_tour}
            </a>
        </li>
        <li>
            <a href="trash/">
                {*<i class="fa fa-trash fa-fw"></i> *}Корзина
            </a>
        </li>
        <li class="divider"></li>
        <li><a href="about/">{L::navbar_setup_dd_about}</a></li>

        {if $config->dev_mode}
            <li class="divider"></li>
            <li>
                <a href="#modal-loadlog" data-toggle="modal">
                    Статистика загрузки страницы
                </a>
            </li>
            <li>
                <a data-toggle="modal" href="#modal-remote" data-remote="phpinfo/">
                    Конфигурация PHP
                </a>
            </li>
        {/if}
        <li class="divider"></li>
        <li>
            <a href="logout/">
                {L::navbar_profile_dd_exit}
            </a>
        </li>

    </ul>
</li>
