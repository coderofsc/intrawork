    <?php
    /**
     * Smarty plugin - declension modifier
     * @package Smarty
     * @subpackage plugins
     */


    /**
     * Модификатор declension: склонение существительных
     *
     * @param int $count
     * @param string $forms
     * @return string
     */
function smarty_modifier_declension($count, $forms, $language='')
{


    //nplurals=3; plural=(n%10==1 && n%100!=11 ? 0 : n%10>=2 && n%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2);

	// Выделяем отдельные словоформы
	$forms = explode(';', $forms);
	$count = abs($count);
	
	$mod100 = $count % 100;
	
	switch ($count%10) {
		case 1:
			if ($mod100 == 11)
			return $forms[2];
		else
			return $forms[0];
		case 2:
		case 3:
		case 4:
			if (($mod100 > 10) && ($mod100 < 20))
			return $forms[2];
		else
			return $forms[1];
		case 5:
		case 6:
		case 7:
		case 8:
		case 9:
		case 0:
			return $forms[2];	
	}
}
    ?>