<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/MainController.php';

class Reports extends MainController
{
    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function all_reports()
    {
        $title['title'] = $this->lang->line('mobsy_reports');

        $data['customers'] = $this->reports_model->get_all_customers();
        $data['contracts'] = $this->reports_model->get_all_contracts();
        $data['payments'] = $this->reports_model->get_all_payments();

        $this->load->view('templates/header', $title);
        $this->load->view('reports/all_reports', $data);
        $this->load->view('templates/footer');
    }
}
