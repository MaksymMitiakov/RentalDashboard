<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LanguageSwitcher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function switchLang($language = '')
    {
        $language = ($language != '') ? $language : 'turkish';
        $this->session->set_userdata('site_lang', $language);
        //redirect($_SERVER['HTTP_REFERER']);
    }
}
