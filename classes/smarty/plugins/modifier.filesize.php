<?php
/**
 * Smarty plugin - filesize modifier
 * 
 * @author Vasily Melenchuk
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Модификатор filesize: вывод размеров для файлов
 *
 * @param int/float $size
 * @param int $precision - требуемая точность (знаков после запятой)
 * @return string
 */

function smarty_modifier_filesize($size)
{
	$kb 	= 1024;         		// Kilobyte
	$mb 	= 1024 * $kb;   	// Megabyte
	$gb 	= 1024 * $mb;   	// Gigabyte
	$tb 	= 1024 * $gb;   	// Terabyte
	
	if($size < $kb) {
		return $size." Байт";
	}
	else if($size < $mb) {
		return round($size/$kb,2)." Кб";
	}
	else if($size < $gb) {
		return round($size/$mb,2)." Мб";
	}
	else if($size < $tb) {
		return round($size/$gb,2)." Гб";
	}
	else {
		return round($size/$tb,2)." Тб";
	}
	
}
 ?>