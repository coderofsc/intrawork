{extends file="helpers/abstracts/preview_layout.tpl"}

{block name="after_append"}
    CoreIW.init_donuts(args.context);
{/block}
