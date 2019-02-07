<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>{$letter_data.subject}</title><meta http-equiv=Content-Type content="text/html; charset=utf-8" />{literal}<style>body, td {line-height: 18px; font-size:14px;} a { color: #428bca; text-decoration: none;} a:hover { text-decoration: underline; } blockquote { border-left: 1px solid #ccc; margin: 0 0 0 1em; padding-left: 1em; color: #5c5c5c; }</style>{/literal}</head>
<body>

<!-- container table -->
<table  cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td align="center">
			<!-- email wrapper table -->
			<table cellspacing="0" border="0" style="width:100%; padding-left:10px; padding-right: 10px; {*max-width: 1000px;*}"  bgcolor="#ffffff">
				<tr>
					<td style="color:#666666; font-size:12px;">
						<table width="100%" cellpadding="0{*было 10*}" cellspacing="0" border="0">
                            {if !isset($letter_data.greeting) || $letter_data.greeting}
                                {include file="./greeting.tpl"}
                            {/if}
                            {include file="./body.tpl"}
                            {*
                            {if !isset($letter_data.parting) || $letter_data.parting}
                                {include file="./parting.tpl"}
                            {/if}
                            *}
                            {if !isset($letter_data.footer) || $letter_data.footer}
                            {include file="./footer.tpl"}
                            {/if}
						</table>
					</td>
				</tr>
			</table>
			<!-- end email wrapper table -->
		</td>
	</tr>
</table>
<!-- end container table -->

</body>
</html>