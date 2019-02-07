{function name=get_name id=0 link=false nosmall=false}
    {if $link}<a class="catpath" href="demands/?cnd[cat_id]={$id}">{/if}{$cuser_data.ar_access_line_categories.$id.name}{if $link}</a>{/if}
    {if $cuser_data.ar_access_line_categories.$id.parent_id}<span class="text-muted {if !$nosmall}small{/if}"> / {get_name id=$cuser_data.ar_access_line_categories.$id.parent_id link=$link}</span>{/if}
{/function}

{get_name id=$id link=$link nosmall=$nosmall}