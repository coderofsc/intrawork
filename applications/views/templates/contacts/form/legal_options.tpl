<option value="{$smarty.const.NATURAL_PERSON}">Физическое лицо</option>
<option {if $contact_data.legal == $smarty.const.LEGAL_PERSON}selected=""{/if} value="{$smarty.const.LEGAL_PERSON}">Юридическое лицо</option>
