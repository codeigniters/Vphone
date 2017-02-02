<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vphone
{
    private $CI     = null;

    public $phone   = null;
    public $type    = 'IR';


    function __construct() 
    {
        $this->CI =& get_instance();
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
            case 'IR':
            case 'ir':
                return '/^(09)[0-9]{8}\d$/';
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
        if($this->phone AND get_regex())
        {
            if(preg_match($this->get_regex(), $this->phone))
            {
                return TRUE;
            }
        }

        return FALSE;
    }

}