<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/LanguageSwitch.php';

class MainController extends LanguageSwitcher
{
    public function __construct()
    {
        parent::__construct();

        $this->switchLang('');//$this->switchLang('turkish');
    }

    public function send_email($to, $subject, $message)
    {
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->to($to);
        $this->email->from('youremail@example.com');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function send_config_email($name, $user_email, $amount, $subject, $template)
    {
        //setup SMTP configurion
        $config = array(
          'protocol' => 'smtp',
          'smtp_host' => 'mobsy.com.tr',
          'smtp_port' => 587,
          'smtp_user' => 'bilgi@mobsy.com.tr',
          'smtp_pass' => '$Ma3j01r',
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'TLS/SSL' => 'required',
        );

        $this->load->library('email'); // Load email template

        $this->email->initialize($config);
        $this->email->set_mailtype('html');
        $this->email->set_newline("\r\n");
        $this->email->from('bilgi@mobsy.com.tr', 'MOBSY Corporation');

        $data = array(
            'name' => $name,
            'amount' => $amount,
        );

        $this->email->to($user_email); // replace it with receiver email id
        $this->email->subject($subject); // replace it with email subject
        $message = $this->load->view($template, $data, true);
		
        $this->email->message($message);
        $result = $this->email->send();
    }

}
