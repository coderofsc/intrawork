<?php
/**
 * Оптимизатор HTML/XML/JS/CSS кода на PHP.
 * The optimizer of HTML/XML/JS/CSS code on PHP.
 *
 * НАЗНАЧЕНИЕ
 * Оптимизация сгенерированного PHP скриптом HTML/XML/JS/CSS кода перед выводом в браузер, оптимизация "на лету".
 *
 * Пример использования:
 * ob_start(array('Optimize', 'html');
 *
 * Никогда не экономьте на отступах и пробелах в написании кода и ваш КПД увеличится! :)
 *
 * TODO
 * исправить ошибку в методе javascript():
 * }};else -- точка с запятой перед else стоять не может
 *
 * @tags     php, html, xml, js, javascript, css, cleaner, clean, cleanse, clear, cruncher, optimize, optimizer, purge, obfuscate, vacuum, vacuumize
 * @license  http://creativecommons.org/licenses/by-sa/3.0/
 * @author   Nasibullin Rinat, http://orangetie.ru/
 * @charset  ANSI
 * @version  2.3.4
 */
class Optimize
{
    private static $_html_is_js, $_html_is_css;

    #пробелы до и после перевода строк и сами переводы строк (с последующими пробелами и переводами строк) заменяет на \r
    public static function strip_spaces(/*string*/ $s)
    {
        #вырезаем пробелы в начале и в конце переводов строк
        return preg_replace('/ [\x20\t]*+      #возможные пробелы ПЕРЕД переносом строки
                               [\r\n]          #первый перенос строки
                               [\x03-\x20]*+   #возможные пробельные символы ПОСЛЕ переноса строки
                             /sxSX', "\r", $s);
    }

    #очень быстрый оптимизатор CSS кода
    public static function css(/*string*/ $s)
    {
        #вырезаем многострочные комментарии /* ... */
        if (strpos($s, '/*') !== false) $s = preg_replace('~/\*.*?\*/~sSX', ' ', $s);
        #вырезаем лишние пробелы
        if (preg_match('/[\x03-\x20]/sSX', $s))
        {
            /*
              IE7 хочет после закрывающей круглой скобки пробел перед цифрами и буквами, если его нет, то CSS становится разбитым, например:
              background:url(/img/cat.png)0 0 no-repeat;
            */
            $s = preg_replace('/\)[\x03-\x20]++(?=[-a-zA-Z\d])/sSX', ")\x01", $s); #fix for IE7
            $a = preg_split('/([{}():;,%!*=]++)/sSX', $s, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $s = implode('', array_map('trim', $a));
            $s = str_replace(")\x01", ') ', $s); #fix for IE7
            $s = preg_replace('/[\x03-\x20]++/sSX', ' ', $s);
            /*
              Относительные размеры (специфицируют значение размера относительно какого-либо исходного свойства размера)
                em: 'font-size' соответствующего шрифта; 
                ex: 'x-height' соответствующего шрифта; 
                px: пикселы, относительно устройства просмотра.
              Абсолютные единицы измерения (используются только тогда, когда известны физические свойства выводного устройства)
                in: inches/дюймы -- 1 дюйм равен 2.54 сантиметра.
                cm: сантиметры
                mm: миллиметры
                pt: points/пункты - пункт, используемый в  CSS2, равен 1/72 дюйма. 
                pc: picas/пики -- 1 пика равна 12 пунктам.
            */
            #converts '0px' to '0'
            $s = preg_replace('/ (?<![\d\.])
                                 0(?:em|ex|px|in|cm|mm|pt|pc|%)
                                 (?![a-zA-Z%])
                               /sxSX', '0', $s);
            #converts '#rrggbb' to '#rgb' or '#rrggbbaa' to '#rgba';
            #IE6 incorrect parse #rgb in entry, like 'filter: progid:DXImageTransform.Microsoft.Gradient(startColorStr=#ffffff, endColorStr=#c9d1d7, gradientType=0);'
            $s = preg_replace('/ :\# ([\da-fA-F])\1  #rr
                                     ([\da-fA-F])\2  #gg
                                     ([\da-fA-F])\3  #bb
                                     (?:([\da-fA-F])\4)?+  #aa
                                 (?![\da-fA-F])
                               /sxSX', ':#$1$2$3$4', $s);
        }
        return $s;
    }

    #оптимизатор JavaScript кода (псевдоним)
    public static function js(/*string*/ $s, $is_vacuumize = true, $is_script_tag = false)
    {
        return self::javascript($s, $is_vacuumize, $is_script_tag);
    }

    #оптимизатор JavaScript кода
    public static function javascript(/*string*/ $s, $is_vacuumize = true, $is_script_tag = false)
    {
        if ($is_vacuumize)
        {
            $re_chunks = ($is_script_tag ? '|  <!-- (?!\/\/-->)           #fix IE-6.0 bug?' : '') . '
                         |  [\x20\r\n\t]*  [;{}()]  [;{}()\x20\r\n\t]*    #expression delimiters
                         |  [\x20\r\n\t]+  (?![a-zA-Z\d\_\$])             #air BEFORE variable
                         |  (?<![a-zA-Z\d\_\$]|\x01@\x02)  [\x20\r\n\t]+  #air AFTER variable';
        }
        else $re_chunks = '';
        /*
        http://www.crockford.com/javascript/jsmin.html
        Use parens with confusing sequences of + or -.
        For example, minification changes "a + ++b" into "a+++b" which is interpreted as "a++ + b" which is wrong.
        You can avoid this by using parens: "a + (++b)".
        JSLint checks for all of these problems: http://www.jslint.com/
        */
        $s = preg_replace_callback('/#remove chunks
                                        \/\*  .*?                      \*\/  #multi line comment
                                     |  \/\/  (?>(?!\/\/) [^\r\n])*          #single line comment
                                     #ignore chunks
                                     |  "     (?>[^"\\\\\r\n]+ |\\\\.)*  "   #string
                                     |  \'    (?>[^\'\\\\\r\n]+|\\\\.)*  \'  #string
                                     |  \/    (?>[^\/\\\\\r\n]+|\\\\.)+  \/  #regular expression
                                     |  \+    [\r\n\t]++             (?=\+)  #safe for "a + ++b"
                                     |  -     [\r\n\t]++             (?=\-)  #safe for "a - --b"
                                     #vacuumize chunks
                                     ' . $re_chunks . '
                                    /sxSX', array('self', '_js_vacuumize'), $s);
        return str_replace("\x01@\x02", '', $s);
    }

    /**
     * Оптимизатор HTML/XML кода
     *
     * ВОЗМОЖНОСТИ
     *   * удаляет пробелы вначале и в конце переносов строк
     *   * удаляет пробелы ПОСЛЕ открывающих тагов, если перед тагом есть пробел
     *   * удаляет пробелы ПЕРЕД закрывающими тагами, если после тага есть пробел
     *   * удаляет многострочные или большие html комментарии, комментарии в javascript и стилях.
     *   * корректно обрабатывает таги <pre>, <textarea>, <code>, <nooptimize>
     *   * специальный таг <nooptimize> на выходе вырезается.
     *
     * ОСОБЕННОСТИ
     *   Ценность этого оптимизатора в том, что он аккуратен к html коду с формами ввода,
     *   "с умом" вырезает комментарии вида <!--...--> и // в <script>...</script>.
     *   Верстальщики могут временно/навсегда комментировать большие участки html кода,
     *   писать пояснительные комментарии для себя, не опасаясь за размер выходного файла.
     *
     * С параметрами по умолчанию Optimize::html() даёт приемлемое сжатие за небольшое время работы,
     * (баланс между степенью сжатия и скоростью работы) для использования оптимизации "на лету".
     *
     * @param   string   $s
     * @param   bool     $is_js   "выпускает воздух" из javascript, не рекомендуется для оптимизации "на лету"
     * @param   bool     $is_css  "выпускает воздух" из стилей,     не рекомендуется для оптимизации "на лету"
     * @return  string
     */
    public static function html(/*string*/ $s, $is_js = false, $is_css = false)
    {
        #в библиотеке PCRE для PHP \s - это любой пробельный символ, а именно класс символов [\x09\x0a\x0c\x0d\x20\xa0] или, по другому, [\t\n\f\r \xa0]
        #если \s используется с модификатором /u, то \s трактуется как [\x09\x0a\x0c\x0d\x20] (тоже самое, но без \xa0)
        #regular expression for tag attributes
        #correct processes dirty and broken HTML in a singlebyte or multibyte UTF-8 charset!
        static $re_attrs_fast_safe =  '(?![a-zA-Z\d])  #statement, which follows after a tag
                                       #correct attributes
                                       (?>
                                           [^>"\']++
                                         | (?<=[\=\x03-\x20]|\xc2\xa0) "[^"]*+"
                                         | (?<=[\=\x03-\x20]|\xc2\xa0) \'[^\']*+\'
                                       )*
                                       #incorrect attributes
                                       [^>]*+';

        #заменяем содержимое тагов на врЕменные метки
        $s = preg_replace_callback('/<(pre|code|textarea|nooptimize)(' . $re_attrs_fast_safe . ')(>.*?<\/\\1)>/sxiSX', array('self', '_html_pre'), $s);

        self::$_html_is_js  = $is_js;
        self::$_html_is_css = $is_css;
        $s = preg_replace_callback('/  (<((?i:script|style))' . $re_attrs_fast_safe . '(?<!\/)>)  #1,2
                                       (
                                         #.*?
                                         (?> [^<]+
                                           | (?!<\/?+(?i:\\2)' . $re_attrs_fast_safe . '(?<!\/)>) .
                                         )++           #д.б. что-то внутри!
                                       )               #3
                                       (<\/(?i:\\2)>)  #4

                                       #условные комментарии IE: <!--[if expression]> HTML <![endif]-->
                                     | (<!--\[ [\x03-\x20]*+ if [^a-zA-Z] [^\]]++ \]>) #5

                                       #comments
                                     | <!-- .*? -->

                                     ' . ( $is_js || $is_css ? '
                                       #JS events or style attribute
                                     | (?<=[\x20\r\n\t"\']|\xc2\xa0)
                                       #(?<![a-zA-Z\d])
                                       (on[a-zA-Z]{3,}+|style)       #6 on* or style attribute
                                       (?>[\x03-\x20]+|\xc2\xa0)*+  #пробельные символы (необязательно)
                                       \=
                                       (?>[\x03-\x20]+|\xc2\xa0)*+  #пробельные символы (необязательно)
                                       #значение атрибута:
                                       (
                                            "   [^"]*+    "      #в двойных кавычках
                                         |  \'  [^\']*+  \'      #в одиночных кавычках
                                       )  #7 значение атрибута
                                     ' : '') . '
                                    /sxSX', array('self', '_html_chunks'), $s);
        self::$_html_is_js = null;

        #вырезаем лишние переносы строк после некоторых тагов (+0.005 sec.)
        #атомарную группировку в перечислении названий тагов не используем, т.к. в альтернативах есть "li" и "link"!
        $a = preg_split('/ (
                             (?> <\/?+(?:br|p|div|li|ol|ul|table|t[drh]|meta|link|h[1-6]|form|option|select|title|script|style|map|area|head|body|html)' . $re_attrs_fast_safe . '>
                               | <!--\[if [^\]]++ \]>
                               | <!\[endif\]-->
                             )
                             (?:<\/?+noindex>)?+
                           )
                         /sxiSX', $s, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $s = implode('', array_map('trim', $a));

        #вырезаем пробелы ПОСЛЕ открывающих тагов, если перед тагом есть пробел (+0.001 sec.)
        $s = preg_replace('/ (?<=[\x03-\x20])
                             <[a-z][a-z\d]*+ (?<!<input|<img) ' . $re_attrs_fast_safe . ' >
                             \K  #any previously matched characters not to be included in the final matched sequence
                             [\x03-\x20]++
                           /sxiSX', '', $s);
        #вырезаем пробелы ПЕРЕД закрывающими тагами, если после тага есть пробел (+0.001 sec.)
        $a = preg_split('/ (?<=[\x03-\x20])
                           (<\/[a-zA-Z][a-zA-Z\d]*+>)  #1
                           (?=[\x03-\x20])
                         /sxSX', $s, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $s = implode('', array_map('rtrim', $a));

        #вырезаем лишние пробелы в начале и в конце переводов строк (+0.002 sec.)
        $s = self::strip_spaces($s);

        #восстанавливаем врЕменные метки на содержимое тагов
        $s = self::_html_placeholder($s, $is_restore = true);
        return str_replace(array('<nooptimize>', '</nooptimize>'), '', $s);
    }

    private static function _html_pre(array &$m)
    {
        return '<' . $m[1] . $m[2] . self::_html_placeholder($m[3]) . '>';
    }

    private static function _html_placeholder(/*string*/ $s, $is_restore = false)
    {
        static $tags = array();
        if ($is_restore)
        {
            #d($tags);
            $s = strtr($s, $tags);
            $tags = array();
            return $s;
        }
        $key = "\x01" . count($tags) . "\x02";
        $tags[$key] = $s;
        return $key;
    }

    #вырезаем комментарии
    private static function _html_chunks(array &$m)
    {
        #<script> or <style> tag
        if (@$m[1])
        {
            if (! $m[3]) return $m[0];
            $s = (strtolower($m[2]) === 'script') ? self::javascript($m[3], self::$_html_is_js, $is_script_tag = true)
                : self::css($m[3]);
            return $m[1] . self::_html_placeholder(self::strip_spaces($s)) . $m[4];
        }

        if (@$m[6] === 'style')
        {
            if (self::$_html_is_css) $m[7] = self::css($m[7]);
            return self::_html_placeholder('style=' . self::strip_spaces($m[7]));
        }

        #js events: onClick, onMouseOver and etc.
        if (@$m[6])
        {
            if (! self::$_html_is_js) return self::_html_placeholder(self::strip_spaces($m[6] . '=' . $m[7]));
            $attr  =& $m[6];
            $value = substr($m[7], 1, -1);
            #в значении атрибута могут использоваться юникод-сущности, но нам в первую очередь нужно это:
            #~ htmlspecialchars_decode() + декодируем DEC и HEX сущности
            if (! function_exists('utf8_html_entity_decode')) require_once 'utf8_html_entity_decode.php';
            $value = utf8_html_entity_decode($value, $is_htmlspecialchars = true);
            return self::_html_placeholder($attr . '="' . htmlspecialchars(self::strip_spaces(self::javascript($value, self::$_html_is_js, $is_script_tag = false))) . '"');
        }

        #условные комментарии IE не вырезаем!
        if (@$m[5]) return $m[0];
        #счётчики и баннеры могут использовать в комментариях свои сигнатуры,
        #поэтому не вырезаем комментарии, если длина текста мала, текст в ANSI и нет переносов строк и тагов
        if (preg_match('/^<!--(?:[\x20-\x7e]{4,60}+$|\xc2\xa0|&nbsp;)/sSX', $m[0]) &&  #\xc2\xa0 = &nbsp;
            ! preg_match('/<[a-zA-Z][a-zA-Z\d]*+ [^>]*+ >/sxSX', $m[0])) return $m[0];
        return '';
    }

    private static function _js_vacuumize(array &$m)
    {
        $s =& $m[0];
        $token_type = substr($s, 0, 2);

        #remove chunks
        if ($token_type == '/*') return '';
        if ($token_type == '//')
        {
            if (strpos($s, '-->') !== false || strpos($s, '<![CDATA[') !== false || strpos($s, ']]>') !== false) return $s . "\r\x01@\x02";
            return '';
        }

        #ignore chunks
        if ($token_type == '<!') return $s . "\r";
        if (strpos('"\'/+-', $s{0}) !== false) return $s;

        #vacuumize chunks
        $s = str_replace(array(' ', "\r", "\n", "\t"), '', $s);
        return preg_replace('/ ;++ (\}++) $/sxSX', '$1;', $s);
    }

}

?>