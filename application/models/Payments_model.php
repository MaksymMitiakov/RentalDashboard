<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payments_model extends CI_Model
{
    public function __contruct()
    {
        $this->load->database();
    }

    public function get_contract_details($data)
    {
        if ($this->session->userdata('usertype') == 'Admin') {
            $sql = "SELECT *, contracts.status as contract_stats,buildings.address as addre, buildings.name as building, homes.door_number as home FROM contracts,buildings,homes,customers,approved_contracts WHERE contracts.building_id=buildings.id AND contracts.home_id=homes.id AND contracts.customer_id=customers.id  AND approved_contracts.contract_id = contracts.id AND contracts.id= '$data' ";
        } else {
            $sql = "SELECT *, contracts.status as contract_stats,buildings.address as addre, buildings.name as building, homes.door_number as home FROM contracts,buildings,homes,customers,approved_contracts WHERE contracts.building_id=buildings.id AND contracts.home_id=homes.id AND contracts.customer_id=customers.id  AND approved_contracts.contract_id = contracts.id AND contracts.id= '" . $data . "' AND contracts.added_user_id = '" . $this->session->userdata('user_id') . "' ";
        }

        $query = $this->db->query($sql);

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function c_payment_check($data)
    {
        $sql = "SELECT * FROM `contract_transactions` WHERE contract_id = '$data' ORDER BY transaction_id DESC LIMIT 1";
        $query = $this->db->query($sql);

        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_transactiont_types()
    {
        $this->db->select('*');
        $this->db->from('transaction_types');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function c_paid($data)
    {
        $this->db->set('status', 'Paid');
        $this->db->where('contract_id', $data);
        $this->db->update('approved_contracts');

        $this->db->set('status', 'Paid');
        $this->db->where('id', $data);
        $this->db->update('contracts');

        return $this->db->affected_rows();
    }

    public function insert_c_payment($data, $row_id)
    {
        $contract_id = $data['contract_id'];

        if (isset($data['c_total_pay'])) {
            $transaction = array(
                'contract_id' => $contract_id,
                'date' => date('Y-m-d'),
                'amount' => $data['c_total_pay'],
                'payment_type' => $data['payment_type'],
                'row_id' => $row_id,
                'collected_by' => $this->session->userdata('user_id'),
                'due_payment' => $data['due_payment'],
                'notes' => 'Penalty added',
            );
            $this->db->insert('contract_transactions', $transaction);
        } else {
            if($data['due_payment'] == 0){
                $this->db->select('*');
                $this->db->from('contracts');
                $this->db->where('id', $data);
                $result = $this->db->get();

                $contractarr = $result->result_array();

                $this->db->set('status', 'New');
                $this->db->where('id', $contractarr[0]["home_id"]);
                $this->db->update('homes');
            }
            $transaction = array(
                'contract_id' => $contract_id,
                'date' => date('Y-m-d'),
                'amount' => $data['monthly_payment'],
                'due_payment' => $data['due_payment'],
                'collected_by' => $this->session->userdata('user_id'),
                'row_id' => $row_id,
                'payment_type' => $data['payment_type'],
                'notes' => 'Monthly payment',
            );
            $this->db->insert('contract_transactions', $transaction);
        }

        return $this->db->affected_rows();
    }

    public function get_payment_first_six_months($data)
    {
        $sql = "SELECT * FROM `contract_transactions` WHERE contract_id = '$data' AND row_id BETWEEN 1 AND 6";

        $query = $this->db->query($sql);

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_payment_second_six_months($data)
    {
        $sql = "SELECT * FROM `contract_transactions` WHERE contract_id = '$data' AND row_id BETWEEN 7 AND 12";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }



    public function payment_check($data)
    {
        $sql = "SELECT * FROM `payment_transactions` WHERE loan_no = '$data' ORDER BY transaction_id DESC LIMIT 1";
        $query = $this->db->query($sql);

        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_transaction_details($data)
    {
        $this->db->select('*');
        $this->db->from('contract_transactions');
      //  $this->db->join('contracts', 'contract_transactions.contract_id = contracts.id');
        $this->db->where('transaction_id', $data);
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_contract($data)
    {
        $this->db->select('*');
        $this->db->from('contracts');
      //  $this->db->join('contracts', 'contract_transactions.contract_id = contracts.id');
        $this->db->where('id', $data);
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_customer_info($data)
    {
        $this->db->select('*, customers.fullname as fullName');
        $this->db->from('customers');
        $this->db->join('contracts', 'contracts.customer_id = customers.id');
        $this->db->where('contracts.id', $data);
        $result = $this->db->get();

        return $result->result_array();
    }

    public function insert_payment($data, $payment_no)
    {
        $contract_id = $data['contract_id'];

        if (isset($data['total_pay'])) {
            $payment = array(
                'contract_id' => $contract_id,
                'date' => date('Y-m-d'),
                'amount' => $data['total_pay'],
                'transaction_id' => $payment_no,
                'notes' => 'Penalty added',
                'collected_by' => $this->session->userdata('username'),
            );
            $this->db->insert('contract_transactions', $payment);
        } else {
            $payment = array(
                'contract_id' => $contract_id,
                'date' => date('Y-m-d'),
                'amount' => $data['monthly_payment'],
                'transaction_id' => $payment_no,
                'notes' => 'Monthly payment',
                'collected_by' => $this->session->userdata('username'),
            );
            $this->db->insert('contract_transactions', $payment);
        }

        return $this->db->affected_rows();
    }

    public function get_payment_first_month($data)
    {
        $sql = "SELECT * FROM `payment_transactions` WHERE loan_no = '$data' AND transaction_id BETWEEN 1 AND 30";

        $query = $this->db->query($sql);

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_payment_second_month($data)
    {
        $sql = "SELECT * FROM `payment_transactions` WHERE loan_no = '$data' AND transaction_id BETWEEN 31 AND 60";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function paid($data)
    {
        $this->db->set('status', 'Paid');
        $this->db->where('contract_id', $data);
        $this->db->update('approved_contracts');

        $this->db->set('status', 'Paid');
        $this->db->where('id', $data);
        $this->db->update('contracts');

        $this->db->select('*');
        $this->db->from('contracts');
        $this->db->where('id', $data);
        $result = $this->db->get();

        $contractarr = $result->result_array();

        $this->db->where('contract_id', $data);
        $this->db->delete('contract_transactions');

        $this->db->set('status', 'New');
        $this->db->where('id', $contractarr[0]["home_id"]);
        $this->db->update('homes');

        // for($i = 1; $i < 13; $i++)
        // {
        //     $transaction_data = array(
        //         "row_id" => $i,
        //         "contract_id" => $data,
        //         "payment_type" => 5,
        //         "amount" => $contractarr[0]["contract_amount"] / 12,
        //         "due_payment" => $contractarr[0]["contract_amount"] - $contractarr[0]["contract_amount"] * $i / 12,
        //         "collected_by" => $this->session->userdata('user_id'),
        //         "notes" => "Toplu Ödeme",
        //         'date' => date('Y-m-d')
        //     );

        //     $this->db->insert('contract_transactions', $transaction_data);
        // }
        $transaction_data = array(
            "row_id" => 1,
            "contract_id" => $data,
            "payment_type" => 5,
            "amount" => $contractarr[0]["contract_amount"],
            "due_payment" => 0,
            "collected_by" => $this->session->userdata('user_id'),
            "notes" => "Fully payment",
            'date' => date('Y-m-d')
        );

        $this->db->insert('contract_transactions', $transaction_data);
        return $this->db->affected_rows();
    }
}
