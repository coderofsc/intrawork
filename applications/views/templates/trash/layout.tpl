{extends file="helpers/abstracts/preview_layout.tpl"}

{block name="prepend"}
    <div class="alert alert-warning ">
        <p>Объекты, находящиеся в корзине более 14 дней, будут автоматически удалены, без возможности восстановленния.</p>
        <div class="space space-sm"></div>
        <a href="trash/clear/" class="confirmcall btn btn-sm btn-danger" data-confirm-title="Очистка корзины" data-confirm="Вы уверены, что хотите очистить корзину? <strong class='text-danger'>Данные будут безвозвратно удалены</strong>.">Очистить корзину</a>
    </div>
{/block}

{block name="after_append"}
    CoreIW.init_donuts(args.context);
{/block}
