<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reports_model extends CI_Model
{
    public function __contruct()
    {
        $this->load->database();
    }

    public function get_all_customers()
    {
        $this->db->select('*');
        $this->db->from('customers');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all_contracts()
    {
        $this->db->select('*, contracts.status as contract_status, contracts.id as contractNo');
        $this->db->from('contracts');
        $this->db->join('customers', 'customers.id=contracts.customer_id');
        $this->db->join('approved_contracts', 'approved_contracts.contract_id=contracts.id');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all_payments()
    {
        $this->db->select('*, contracts.id as contractNo');
        $this->db->from('contracts');
        $this->db->join('customers', 'customers.id=contracts.customer_id');
        $this->db->join('contract_transactions', 'contract_transactions.contract_id=contracts.id');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
}
