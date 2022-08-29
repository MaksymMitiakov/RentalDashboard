<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/MainController.php';

class Payments extends MainController
{
    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function contract_details($contract_id = '')
    {
        $this->check_auth('customers_profile');

        $contract = $contract_id;

        if ($contract != '') {
            $result['contract'] = $this->payments_model->get_contract_details($contract);
            $result['transactiont_type'] = $this->payments_model->get_transactiont_types();

            if (!is_null($result)) {
                $result['pny'] = $this->payments_model->c_payment_check($contract);

                $amount = intval($result['contract']['monthly_payment']);
                $total_amount = intval($result['contract']['contract_amount']);
                if (!is_null($result['pny'])) {
                    $d = 0;
                    if (!empty($result['pny'][0]['due_payment'])) {
                        $d = $result['pny'][0]['due_payment'];
                    }

                    $now = time();
                    $date = strtotime($d);
                    $total_pay = ($total_amount - $d) + $amount;

                    $result['due_payment'] = $total_amount - $total_pay;
                } else {
                    $result['due_payment'] = $total_amount - $amount;
                }

                $title['title'] = $this->lang->line('contract_details');

                $result['first_mnth'] = $this->payments_model->get_payment_first_six_months($result['contract']['contract_id']);
                $result['second_mnth'] = $this->payments_model->get_payment_second_six_months($result['contract']['contract_id']);
                $this->load->view('templates/header', $title);
                $this->load->view('payments/contract_payments', $result);
                $this->load->view('templates/footer');
            } else {
                redirect(base_url('error404'));
            }
        } else {
            $title['title'] = $this->lang->line("search_contracts");

            $this->load->view('templates/header', $title);
            $this->load->view('payments/contract_search');
            $this->load->view('templates/footer');
        }
    }

    public function pay_contract()
    {
        $validator = array('success' => false, 'message' => array());

        $data = $this->input->post();

        $check['pny'] = $this->payments_model->c_payment_check($data['contract_id']);

        if (empty($check['pny'][0]['row_id'])) {
            $row_id = 1;

            $result = $this->payments_model->insert_c_payment($data, $row_id);

            if ($result) {
                $validator['success'] = true;
                $validator['message'] = 'Payment successfull!';
            } else {
                $validator['success'] = false;
                $validator['message'] = 'Payment error!';
            }
        } else {
            $row_id = $check['pny'][0]['row_id'] + 1;

            $result = $this->payments_model->insert_c_payment($data, $row_id);
            if ($result) {
                $validator['success'] = true;
                $validator['message'] = 'Payment successfull!';
            } else {
                $validator['success'] = false;
                $validator['message'] = 'Payment error!';
            }
        }

        echo json_encode($validator);
    }

    public function c_fully_paid()
    {
        $data = array('success' => false, 'message' => array());

        $result = $this->payments_model->c_paid($this->input->post('contact_id'));

        if ($result) {
            $data['success'] = true;
            $data['message'] = 'This loan is fully paid!';
        } else {
            $data['success'] = false;
            $data['message'] = 'This loan is not fully paid!';
        }

        echo json_encode($data);
    }

    public function invoice($transaction_id = '')
    {
        //	$this->check_auth('approved_contracts');

        $transaction = $transaction_id;

        if ($transaction != '') {
            $result['transaction'] = $this->payments_model->get_transaction_details($transaction);
            //	$result['contract'] = $this->payments_model->get_contract($transaction);
            if (!is_null($result)) {
                $title['title'] = $this->lang->line("mobsy_invoice");

                $result['customer'] = $this->payments_model->get_customer_info($result['transaction'][0]['contract_id']);
                $this->load->view('templates/header', $title);
                $this->load->view('payments/invoice', $result);
                $this->load->view('templates/footer');
            } else {
                redirect(base_url('error404'));

            }
        }
    }

    public function turnkey($contract_id = '')
    {
        //	$this->check_auth('approved_contracts');

        $contract = $contract_id;

        if ($contract != '') {
            $result['contract'] = $this->payments_model->get_contract($contract);
            //	$result['contract'] = $this->payments_model->get_contract($transaction);

            if (!is_null($result)) {
                $title['title'] = $this->lang->line("mobsy_turnkey");

                $result['customer'] = $this->payments_model->get_customer_info($result['contract'][0]['id']);
                $this->load->view('templates/header', $title);
                $this->load->view('payments/turnkey', $result);
                $this->load->view('templates/footer');
            } else {
                redirect(base_url('error404'));
            }
        }
    }


    public function evacuation($contract_id = '')
    {
        //	$this->check_auth('approved_contracts');

        $contract = $contract_id;

        if ($contract != '') {
            $result['contract'] = $this->payments_model->get_contract($contract);
            //	$result['contract'] = $this->payments_model->get_contract($transaction);

            if (!is_null($result)) {
                $title['title'] = $this->lang->line('mobsy_evacuation');

                $result['customer'] = $this->payments_model->get_customer_info($result['contract'][0]['id']);

                $this->load->view('templates/header', $title);
                $this->load->view('payments/evacuation', $result);
                $this->load->view('templates/footer');
            } else {
                redirect(base_url('error404'));
            }
        }
    }


    public function search_contract()
    {
        $validator = array('success' => false, 'loan' => array());

        $data = $this->input->post('contract_no');

        $result = $this->payments_model->get_contract_details($data);

        if (!is_null($result)) {
            $validator['success'] = true;

            $validator['contract'] = array(
                'contract_no' => $result['contract_id'],
                'name' => $result['fullname'],
                'amount' => $result['contract_amount'],
                'date' => $result['date_approved'],
            );
        } else {
            $validator['success'] = false;
            $validator['contract'] = $this->lang->line("contract_number_not_found");
        }

        echo json_encode($validator);
    }

    public function pay_loan()
    {
        $validator = array('success' => false, 'message' => array());

        $data = $this->input->post();

        $check['pny'] = $this->payments_model->payment_check($data['loan_no']);

        if (empty($check['pny'][0]['payment_no'])) {
            $payment_no = 1;

            $result = $this->payments_model->insert_payment($data, $payment_no);

            if ($result) {
                $validator['success'] = true;
                $validator['message'] = $this->lang->line("payment_successfully");
            } else {
                $validator['success'] = false;
                $validator['message'] = $this->lang->line("payment_error");
            }
        } else {
            $now = time();
            $date = strtotime($check['pny'][0]['date']);
            $datediff = $now - $date;

            $payment_no = round($datediff / (60 * 60 * 24)) + $check['pny'][0]['payment_no'];

            $result = $this->payments_model->insert_payment($data, $payment_no);
            if ($result) {
                $validator['success'] = true;
                $validator['message'] = $this->lang->line("payment_successfully");
            } else {
                $validator['success'] = false;
                $validator['message'] = $this->lang->line("payment_error");
            }
        }

        echo json_encode($validator);
    }

    public function fully_paid()
    {
        $data = array('success' => false, 'message' => array());

        $result = $this->payments_model->paid($this->input->post('contract_no'));

        if ($result) {
            $validator['success'] = true;
            $validator['message'] = $this->lang->line("payment_successfully");
        } else {
            $validator['success'] = false;
            $validator['message'] = $this->lang->line("payment_error");
        }

        echo json_encode($data);
    }
}
