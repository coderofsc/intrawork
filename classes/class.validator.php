<?php

class cls_validator {

    private $_field_data    = array();
    private $_error_messages = array();
    private $_error_prefix	= '<p>';
    private $_error_suffix	= '</p>';
    private $_data_to_check = false;


    function __construct($_data_to_check = false){
        if ($_data_to_check) {
            $this->_data_to_check = $_data_to_check;
        } else {
            $this->_data_to_check = $_POST;
        }
    }


    /**
     * Установка полей валидации
     */
    function set_rules($field, $label = '', $rules = ''){

        //Нет POST данных
        if (sizeof($this->_data_to_check) == 0){

            return;
        }

        //Если правила валидации переданы в виде массива
        if(is_array($field)){

            foreach ($field as $row){

                //Если не установлено поле валидации или правила валидации,
                //то пропускаем это поле
                if ( ! isset($row['field']) OR ! isset($row['rules'])){

                    continue;
                }

                //Если название поля не передано используем имя поля
                $label = ( ! isset($row['label'])) ? $row['field'] : $row['label'];


                $this->set_rules($row['field'], $label, $row['rules']);
            }
            return;
        }

        //Правила валидации должны быть переданы в виде массива,
        //а поле валидации строкой
        if ( ! is_string($field) OR  ! is_array($rules) OR $field == ''){

            return;
        }


        //Если название поля не передано используем имя поля
        $label = ($label == '') ? $field : $label;


        $this->_field_data[$field] = array(
            'field'		=> $field,
            'label'		=> $label,
            'rules'		=> $rules,
            'postdata'	=> NULL,
            'error'		=> ''
        );
    }



    /**
     * Валидация данных
     */
    function run(){

        //Нет POST данных
        if (sizeof($this->_data_to_check) == 0){

            return true;
        }

        //Если нет заданных полей для валидации
        if(sizeof($this->_field_data) == 0){

            return true;
        }


        foreach ($this->_field_data as $field => $row){

            //Получаем POST данные для установленных полей валидации
            //if (isset($this->_data_to_check[$field])){

            $this->_field_data[$field]['postdata'] = (isset($this->_data_to_check[$field]))? $this->_data_to_check[$field]: NULL;

            //Проверка правил валидации
            $this->checkrule($row,$this->_field_data[$field]['postdata']);
            //}
        }


        $total_errors = sizeof($this->_error_messages);

        if($total_errors == 0){

            return TRUE;
        }

        return FALSE;
    }


    /**
     *
     * Проверка правил валидации
     */
    function checkrule($field,$postdata){

        if(is_array($postdata)){

            foreach($postdata as $key => $val){

                $this->checkrule($field,$val);
            }

            return;
        }

        foreach($field['rules'] as $rule => $message){

            $param = FALSE;

            if (preg_match("/(.*?)\[(.*?)\]$/", $rule, $match))
            {
                $rule	= $match[1]; //Правило валидации
                $param	= $match[2]; //Параметры
            }

            //если это правило не входит с состав библиотеки
            if(!method_exists($this, $rule)){

                //то будем считать, что это стандартная функция PHP
                //которая принимает только один входной параметр
                if(function_exists($rule)){

                    $result = $rule($postdata);

                    //Если функция возвращает булевое значение (TRUR|FALSE),
                    //то мы не изменяем переданные POST данные, иначе записываем
                    //отформатированные данные
                    $postdata = (is_bool($result)) ? $postdata : $result;
                    $this->set_field_postdata($field['field'],$postdata);

                    continue;
                }
            }
            else{

                $result = $this->$rule($postdata,$param);
            }


            $postdata = (is_bool($result)) ? $postdata : $result;
            $this->set_field_postdata($field['field'],$postdata);

            //если данные не прошли валидацию
            if($result === FALSE && $message != ''){

                //Формируем сообщение об ошибке
                $error = sprintf($message, $field['label']);

                //Сохраняем сообщение об ошибке
                $this->_field_data[$field['field']]['error'] = $error;

                if ( ! isset($this->_error_messages[$field['field']])){

                    $this->_error_messages[$field['field']] = $error;
                }

            }

            continue;
        }

        return;
    }


    /**
     * Установка POST данных
     */
    private function set_field_postdata($field,$postdata){

        if(isset($this->_field_data[$field]['postdata'])){

            $this->_field_data[$field]['postdata'] = $postdata;

        }
    }



    /**
     * Возвращает POST данные для нужного элемента
     */
    function postdata($field){

        if(isset($this->_field_data[$field]['postdata'])){

            return $this->_field_data[$field]['postdata'];
        }
        else return FALSE;
    }



    /**
     * Очищает все POST данные
     */
    function reset_postdata(){

        $this->_field_data = array();
    }


    /**
     * Возвращает все сообщения об ошибках в виде строки
     */
    function get_string_errors($prefix = '',$suffix = ''){


        if (count($this->_error_messages) === 0){

            return '';
        }

        if ($prefix == '')
        {
            $prefix = $this->_error_prefix;
        }

        if ($suffix == '')
        {
            $suffix = $this->_error_suffix;
        }

        // Формируем строку с ошибками
        $str = '';
        foreach ($this->_error_messages as $val)
        {
            if ($val != '')
            {
                $str .= $prefix.$val.$suffix."\n";
            }
        }

        return $str;

    }


    /**
     * Возвращает все сообщения об ошибках в виде строки
     */
    function get_array_errors(){

        return $this->_error_messages;
    }


    /**
     * Возвращает сообщение об ошибка для указанного поля
     * @param string
     */
    function form_error($field){

        if(isset($this->_error_messages[$field])){

            return $this->_error_prefix.$this->_error_messages[$field].$this->_error_suffix;
        }
        else return FALSE;
    }



    function set_error_delimiters($prefix = '<p>', $suffix = '</p>')
    {
        $this->_error_prefix = $prefix;
        $this->_error_suffix = $suffix;
    }



    /**
     * Значение не может быть пустым
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    function required($str)
    {
        if ( ! is_array($str))
        {
            return (trim($str) == '') ? FALSE : TRUE;
        }
        else
        {
            return ( ! empty($str));
        }
    }


    /**
     *
     * Проверка поля на целое цисло
     * @param string
     */
    function integer($str){


        return filter_var($str, FILTER_VALIDATE_INT, array('options'=>array('min_range' => 1), 'flags' => FILTER_FLAG_ALLOW_OCTAL));
    }

    /**
     *
     * Проверка поля на регулярное выражение
     * @param string
     */
    function regexp($str, $regexp) {
        return filter_var($str, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$regexp)));
    }


    /**
     *
     * Проверка поля на цисло c плавающей точкой
     * @param string
     */
    function float($str){


        return filter_var($str, FILTER_VALIDATE_FLOAT);
    }


    /**
     * Валидация URL
     * @param string
     */
    function valid_url($str){

        return filter_var($str, FILTER_VALIDATE_URL);
    }


    /**
     *
     * Валидация email-адреса
     * @param string
     */
    function valid_email($str){


        return filter_var($str, FILTER_VALIDATE_EMAIL);
    }


    /**
     *
     * Валидация IP-адреса
     * @param string
     */
    function valid_ip($str){


        return filter_var($str, FILTER_VALIDATE_IP);
    }


    /**
     * Match one field to another
     *
     * @access	public
     * @param	string
     * @param	field
     * @return	bool
     */
    function matches($str, $field)
    {
        if ( ! isset($this->_data_to_check[$field]))
        {
            return FALSE;
        }

        $field = $this->_data_to_check[$field];

        return ($str !== $field) ? FALSE : TRUE;
    }

    function equal_sha1($str, $value)
    {
        return (sha1($str) === $value);
    }

    function in_array($str, $array_str)
    {
        return in_array($str, explode(",", $array_str));
    }

    function not_in_array($str, $array_str)
    {
        return !in_array($str, explode(",", $array_str));
    }


    /**
     * Только буквы латинского алфавита
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    function alpha($str)
    {
        return ( ! preg_match("/^([a-z])+$/i", $str)) ? FALSE : TRUE;
    }



    /**
     * Проверка капчи
     *
     * @access	public
     * @param	string
     * @param	string
     * @return	bool
     */
    function valid_captcha($str,$name){
        return (!empty($_SESSION[$name]) && $_SESSION[$name] == $str)? TRUE: FALSE;
    }

    function valid_recaptcha($str, $challenge){
        $result = recaptcha_check_answer (GOOGLE_RECAPTCHA_PRIVATE_KEY, $_SERVER["REMOTE_ADDR"], $str, $challenge);
        return $result->is_valid;
    }

    /**
     * Проверка даты
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    function valid_date($str){

        $stamp = strtotime( $str );

        if (!is_numeric($stamp)){

            return FALSE;
        }

        $month = date( 'm', $stamp );
        $day   = date( 'd', $stamp );
        $year  = date( 'Y', $stamp );

        return checkdate($month, $day, $year);
    }


    function unique($str, $fields){

        list($table,$field) = explode('.',$fields);
        list($field,$self_id) = explode(':',$field);

        $orm = ORM_EXT::for_table($table);
        $orm->where_equal($field, $str);

        if ($self_id) {
            $orm->where_not_equal("id", $self_id);
        }
        $count = $orm->count();

        return $count == 0;

    }

    function email_exist($email, $current) {
        $orm = ORM_EXT::for_table("users");
        $orm->inner_join("email_addresses", "e_a.id=users.eid", "e_a");
        $orm->where_not_equal("e_a.id", $current);
        $orm->where_equal("e_a.email", $email);

        $count = $orm->count();

        return $count == 0;
    }
}

?>