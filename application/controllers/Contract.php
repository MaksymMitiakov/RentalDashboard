<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/MainController.php';

class Contract extends MainController
{
    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function create_contract($ids = '')
    {
        $this->check_auth('create_contract');

        $title['title'] = $this->lang->line('create_contract');

        //get last loan_no of client
        $id = $this->contract_model->get_contract_no();

        $contract['customers'] = $this->contract_model->get_customer();
        $contract['buildings'] = $this->contract_model->get_building();
        $contract['homes'] = $this->contract_model->get_home();

        if ($ids != '') {
            $contract['customer_id'] = $ids;
        }

        if (is_null($id)) {
            $contract['id'] = 100;

            $this->load->view('templates/header', $title);
            $this->load->view('contract/create_contract', $contract);
            $this->load->view('templates/footer');
        } else {
            $contract['id'] = substr($id['id'], 1);

            $this->load->view('templates/header', $title);
            $this->load->view('contract/create_contract', $contract);
            $this->load->view('templates/footer');
        }
    }

    public function new_contracts()
    {
        $title['title'] = $this->lang->line('new_contracts');

        $this->check_auth('new_contracts');

        $customers['verify'] = $this->contract_model->get_verified_customers();

        $this->load->view('templates/header', $title);
        $this->load->view('contract/new_contracts', $customers);
        $this->load->view('templates/footer');
    }

    public function approved_contracts()
    {
        $title['title'] = $this->lang->line('approved_contracts');

        $this->check_auth('approved_contracts');

        $customers['approved'] = $this->contract_model->get_approved_customers();

        $this->load->view('templates/header', $title);
        $this->load->view('contract/approved_contract', $customers);
        $this->load->view('templates/footer');
    }

    public function promissory($loan_no = '')
    {
        $this->check_auth('approved_contracts');

        $contract = $loan_no;

        if ($contract != '') {
            $result['contract'] = $this->payments_model->get_contract_details($contract);

            if (!is_null($result)) {
                $title['title'] = $this->lang->line('mobsy');
                $result['customer'] = $this->contract_model->get_promissory_customer($result['contract']['customer_id']);
                $result['building'] = $this->contract_model->get_promissory_building($result['contract']['building_id']);
                $result['home'] = $this->contract_model->get_promissory_home($result['contract']['home_id']);
                $result['city'] = $this->contract_model->get_promissory_city($result['contract']['build_id']);
                $result['district'] = $this->contract_model->get_promissory_district($result['contract']['build_id']);
                $result['guarantor'] = $this->contract_model->get_promissory_guarantor($result['contract']['guarantor_id']);
                $result['type'] = $this->contract_model->get_promissory_type($result['contract']['build_id']);
                $result['transaction'] = $this->contract_model->get_promissory_transaction($result['contract']['contract_id']);
                $result['approve'] = $this->contract_model->get_promissory_approve($result['contract']['contract_id']);
                $this->load->view('templates/header', $title);
                $this->load->view('contract/promissory', $result);
                $this->load->view('templates/footer');
            } else {
                redirect(base_url('error404'));
            }
        }
    }

    public function paid_contracts()
    {
        $title['title'] = $this->lang->line('paid_contracts');

        $this->check_auth('paid_contracts');

        $customers['paid'] = $this->contract_model->get_paid_contract();

        $this->load->view('templates/header', $title);
        $this->load->view('contract/paid_contracts', $customers);
        $this->load->view('templates/footer');
    }

    public function rejected_contracts()
    {
        $title['title'] = $this->lang->line('rejected_contracts');

        $this->check_auth('rejected_contracts');

        $customers['rejected'] = $this->contract_model->get_rejected_customers();

        $this->load->view('templates/header', $title);
        $this->load->view('contract/rejected_contract', $customers);
        $this->load->view('templates/footer');
    }


    public function get_customer_info()
    {
        $customer_id = $this->input->post('customer_id');
        $customer_info = $this->contract_model->get_customer_info($customer_id);
        echo json_encode($customer_info);
    }

    public function get_building_homeinfo()
    {
        $building_id = $this->input->post('building_id');
        $homeinfo = $this->contract_model->get_building_homeinfo($building_id);
        echo json_encode($homeinfo);
    }

    public function get_home_info()
    {
        $home_id = $this->input->post('home_id');
        $homeinfo = $this->contract_model->get_home_info($home_id);
        echo json_encode($homeinfo);
    }

    public function insert_contract()
    {
        $validator = array('success' => false, 'messages' => array(), 'email' => false, 'sim_1' => false,  'phone' => array());
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $amount = $this->input->post('contract_amount');
        $email_notif = $this->input->post('email_notif');
        $sim1_notif = $this->input->post('phone_notif');
        $sim1 = $this->input->post('phone');
        $account_no = $this->input->post('customer_id');

        $data = $this->input->post();

        if($this->session->userdata('usertype') != 'Admin')
        {
            $contract_count = $this->contract_model->get_contract_count($this->session->userdata("user_id"));
            $contract_limit = $this->contract_model->get_contract_limit($this->session->userdata("user_id"));
            $contract_count = isset($contract_count)? $contract_count : 0;
            
            if($contract_limit)
            {   
                if($contract_limit <= $contract_count)
                {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line("your_memberships_has_been_expired_please");
                    echo json_encode($validator);
                    return;
                }
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("you_cannot_add_contract_please");
                echo json_encode($validator);
                return;
            }
            
        }

        $guarantor_id = $this->contract_model->insert_guarantor($data);
        if($guarantor_id > 0)
        {
            $insert_data = $this->contract_model->insert_contract($data, $guarantor_id);

            if ($insert_data) {
                if ($email_notif == 'yes') {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $subject = 'Contract Application Verification';
                        $template = 'templates/email_template';

                        $sendmail = $this->send_config_email($fullname, $email, $amount, $subject, $template);

                        $validator['messages'] = $this->lang->line('contract_successfully_registed_email_notification_sent');
                        $validator['email'] = true;
                    } else {
                        $validator['messages'] = $this->lang->line('contract_successfully_registed');
                    }
                }

                $msg = $this->lang->line('sms_message');
                $apicode = 'TR-RFSCO761275_H4IDW';

                if ($sim1_notif == 'yes') {
                    $send_sms1 = $this->itexmo($sim1, $msg, $apicode);

                    if ($send_sms1 == '') {
                        $validator['sim1'] = $this->lang->line("something_went_wrong_please_contact_developer");
                    } elseif ($send_sms1 == 0) {
                        $validator['sim1'] = $this->lang->line('sms_sent_successfully');
                    } else {
                        $validator['sim1'] = $this->lang->line('sms_not_sent');
                    }

                    $validator['sim_1'] = true;
                }

                $this->contract_model->update_customers($account_no);
                $validator['messages'] = $this->lang->line('contract_successfully_registed');
                $validator['success'] = true;
            }
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("something_went_wrong_please");
        }
        echo json_encode($validator);
    }

    public function account_query()
    {
        $data = array('success' => false, 'name' => array(), 'address' => array(), 'email' => array(), 'sim1' => array(), 'sim2' => array());

        $result = $this->claims_model->account_query($_POST['account_no']);

        if ($result) {
            $data['name'] = $result['firstname'].' '.$result['middlename'].' '.$result['lastname'];
            $data['address'] = 'Purok '.$result['purok_no'].', '.$result['barangay'].', '.$result['city'].', '.$result['province'].', '.$result['postal_code'];
            $data['email'] = $result['email'];
            $data['sim1'] = $result['number1'];
            $data['sim2'] = $result['number2'];
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }

        echo json_encode($data);
    }

    public function send_sms($num, $message, $apicode)
    {
        $url = 'https://www.itextmo.com/php_api/api.php';

        $itextmo = array('1' => $num, '2' => $message, '3' => $apicode);

        $param = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($itextmo),
            ),
        );

        $context = stream_context_create($param);

        return file_get_contents($url, false, $context);
    }

    public function itexmo($number, $message, $apicode)
    {
        $passwd = '}%4$$m4ze{';
        $ch = curl_init();
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        curl_setopt($ch, CURLOPT_URL, 'https://www.itexmo.com/php_api/api.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        return curl_exec($ch);
        curl_close($ch);
    }

    public function approve_contract()
    {
        $data = array('success' => false, 'email' => false, 'phone' => array());

        $id = $this->input->post('id');
        $amount = $this->input->post('amount');

        $query = $this->contract_model->get_contract_details($id);

        if ($query) {
            $result = $this->contract_model->approve_contract($id, $amount);
            if ($result) {
                $name = $query['fullName'];
                $email = $query['mails'];
                $amount = $query['amount'];
                $subject = 'MOBSI Contract Application Approval';
                $template = 'templates/email_approval';

                $num = $query['tel'];
                $msg = $this->lang->line('sms_message');
                $apicode = 'TR-RFSCO761275_H4IDW';

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $sendmail = $this->send_config_email($name, $email, $amount, $subject, $template);

                    $data['mail'] = true;
                }

                //$send_sms = $this->itexmo($num, $msg, $apicode);
                $send_sms = '';

                if ($send_sms == '') {
                    $data['tel'] = $this->lang->line("something_went_wrong_please_contact_developer");
                } elseif ($send_sms == 0) {
                    $data['tel'] = $this->lang->line('sms_sent_successfully');
                } else {
                    $data['tel'] = $this->lang->line('sms_not_sent');
                }
            }

            $data['success'] = true;
        } else {
            $data['success'] = true;
        }

        echo json_encode($data);
    }

    public function reject_contract()
    {
        $result = $this->contract_model->reject_contract($this->input->post('id'), $this->input->post('reason'));
        if ($result) {
            echo $this->lang->line("contract_rejected");
        } else {
            echo $this->lang->line('false');
        }
    }

    public function remove_contract()
    {
        $result = $this->contract_model->remove_contract($this->input->post('id'));
        if ($result) {
            echo $this->lang->line("contract_removed");
        } else {
            echo $this->lang->line("false");
        }
    }

    public function cash_recieve2()
    {
        $result = $this->contract_model->cash_recieve2($this->input->post('id'));

        if ($result) {
            $this->contract_model->status_update($this->input->post('id'));
            echo $this->lang->line('cash_released');
        } else {
            echo $this->lang->line("false");
        }
    }

    public function reapply_contract()
    {
        $result = $this->contract_model->reapply_contract($this->input->post('id'));
        if ($result) {
            echo $this->lang->line("contract_successfully_reapplied");
        } else {
            echo $this->lang->line("false");
        }
    }
}
