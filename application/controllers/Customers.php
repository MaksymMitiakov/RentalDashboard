<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/MainController.php';

class Customers extends MainController
{
    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function create_customers()
    {
        $this->check_auth('create_customers');

        $title['title'] = $this->lang->line('create_customers');

        //get last account_no of client
        $account_no = $this->customers_model->get_account_id();

        $customers['jobs'] = $this->customers_model->get_jobs();
        $customers['educations'] = $this->customers_model->get_educations();

        $vendor_id = $this->session->userdata('user_id');

        if (is_null($account_no)) {
            $customers['acc_no'] = 1000;
            $customers['vend_no'] = array('user_id' => $vendor_id);
            $this->load->view('templates/header', $title);
            $this->load->view('customers/create_customers', $customers);
            $this->load->view('templates/footer');
        } else {
            $customers['acc_no'] = array('id' => $account_no['id']);
            $customers['vend_no'] = array('user_id' => $vendor_id);

            $this->load->view('templates/header', $title);
            $this->load->view('customers/create_customers', $customers);
            $this->load->view('templates/footer');
        }
    }

    public function new_customers()
    {
        $this->check_auth('create_customers');

        $title['title'] = $this->lang->line('new_customers');

        $customers['new_customers'] = $this->customers_model->get_new_customers();

        $this->load->view('templates/header', $title);
        $this->load->view('customers/new_customers', $customers);
        $this->load->view('templates/footer');
    }

    public function active_customers()
    {
        $title['title'] = $this->lang->line('active_customers');

        $this->check_auth('active_customers');

        $customers['active'] = $this->customers_model->get_active_customers();

        $this->load->view('templates/header', $title);
        $this->load->view('customers/active_customers', $customers);
        $this->load->view('templates/footer');
    }

    public function customers_profile($account_no)
    {
        $this->check_auth('customers_profile');

        $result = $this->customers_model->get_profile($account_no);

        if (!is_null($result)) {
            $customer['contract'] = $this->customers_model->get_contract($account_no);

            $customer['profile'] = array(
                'ids' => $result['ids'],
                'fullname' => $result['fullname'],
                'email' => $result['email'],
                'phone' => $result['phone'],
                'phone2' => $result['phone2'],
                'identity' => $result['identity'],
                'birthdate' => $result['birthdate'],
                'gender' => $result['gender'],
                'education' => $result['education'],
                'status' => $result['status'],
                'job' => $result['job'],
                'address' => $result['address'],
            );

            $title['title'] = $this->lang->line('profile_').$result['fullname'];

            $this->load->view('templates/header', $title);
            $this->load->view('customers/profile', $customer);
            $this->load->view('templates/footer');
        } else {
            redirect(base_url('error404'));
        }
    }

    public function register_customers()
    {
        $validator = array('success' => false, 'messages' => array());

        $customer_data = array(
                'id' => $this->input->post('id'),
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'phone2' => $this->input->post('phone2'),
                'identity' => $this->input->post('identity'),
                'birthdate' => $this->input->post('birthdate'),
                'gender' => $this->input->post('gender'),
                'education_id' => $this->input->post('education_id'),
                'job_id' => $this->input->post('job_id'),
                'address' => $this->input->post('address'),
                'added_user_id' => $this->input->post('added_user_id'),
            );

        $insert_data = $this->customers_model->insert_customer($customer_data);

        if ($insert_data) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line('successfully_added');
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("something_went_wrong_please");
        }

        echo json_encode($validator);
    }

    public function update_customer()
    {
        $validator = array('success' => false, 'messages' => array());

        $customer_data = array(
                'fullname' => $this->input->post('fullname'),
                'id' => $this->input->post('id'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'phone2' => $this->input->post('phone2'),
                'identity' => $this->input->post('identity'),
                'birthdate' => $this->input->post('birthdate'),
                'gender' => $this->input->post('gender'),
                'education_id' => $this->input->post('education_id'),
                'job_id' => $this->input->post('job_id'),
                'address' => $this->input->post('address'),
            );

        $update_profile = $this->customers_model->update_profile($customer_data);

        if ($update_profile) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line("successfully_updated");
        }

        echo json_encode($validator);
    }

    public function delete_customers()
    {
        $result = $this->customers_model->delete_customers($this->input->post('id'));
        if ($result) {
            echo $this->lang->line("all_client_records_has_been_deleted");
        } else {
            echo $this->lang->line('false');
        }
    }
}
