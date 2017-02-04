<?php

class Vphone
{
    /**
    * Programing web : Mohammad Ghanbari
    * Mobile : +989336505170
    **/
    
    public $phone;
    public $type;

    function __construct() 
    {
        $this->phone    = NULL;
        $this->type     = 'IR';
    }


    /**
    * set phone number
    *
    * @param $phone
    */
    public function set_phone($phone = NULL)
    {
        $this->phone = $phone;
    }


    /**
    * set type, IR is default
    *
    * @param $type
    */
    public function set_type($type = 'IR')
    {
        $this->type = $type;
    }


    /**
     * set type, IR is default
     *
     * @return boolean
     */
    public function check()
    {
        return $this->validation();
    }


    /**
     * select regex in preg_match
     *
     * @param type function set_type
     *
     * @return regex
     */
    private function get_regex()
    {
        switch($this->type)
        {

            // START TYPE IR - IRAN

            case 'IR':
            case 'ir':
                return '/^(09)[0-9]{8}\d$/';
            case 'IR0098':
            case 'ir0098':
                return '/^(0098)[0-9]{9}\d$/';
            case 'IR+98':
            case 'ir+98':
                return '/^(\+98)[0-9]{9}\d$/';

            // END TYPE IR - IRAN

        }

        return FALSE;
    }


    /**
     * check phone number
     *
     * @param phone function set_phone
     * @param regex function get_regex
     *
     * @return boolean
     */
    private function validation()
    {
        if($this->phone AND $this->get_regex())
        {
            if(preg_match($this->get_regex(), $this->toDigit($this->phone)))
            {
                return TRUE;
            }
        }

        return FALSE;
    }

    /**
     * convert persian number to english number
     *
     * @param string
     *
     * @return string
     */
    private function toDigit($string)
    {
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $num = range(0, 9);
        return str_replace($persian, $num, $string);
    }
}
