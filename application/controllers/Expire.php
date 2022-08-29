<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/MainController.php';

class Expire extends MainController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('email');
        //if(!$this->input->is_cli_request())
        //{
        //	echo "This script can only be accessed via the command line" . PHP_EOL;
        //	return;
        //}
        $memberships = $this->expire_model->get_memberships_id();
        if (!empty($memberships)) {
            foreach ($memberships as $membership) {
                $to = $membership->email; // email of vendor
                $subject = 'Memberships Expire'; // subject of email
                $message = 'Memberships will be expired tommorow!'; // message of email
                $this->send_email($to, $subject, $message);
                $this->expire_model->set_memberships_expired($membership->id);
            }
        }
    }
}
