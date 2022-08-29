<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Memberships_model extends CI_Model
{
    public function __contruct()
    {
        $this->load->database();
    }

    public function insert_memberships_packages($data)
    {
        $memberships_data = array(
            'name' => $data['name'],
            'home_limit' => $data['home_limit'],
            'build_limit' => $data['build_limit'],
            'contract_limit' => $data['contract_limit'],
            'amount' => $data['amount'],
            'days' => $data['days'],
            'status' => 'active',
        );
        $this->db->insert('membership_types', $memberships_data);

        return $this->db->affected_rows();
    }

    public function insert_memberships($data)
    {
        $membership_data = array(
            'status' => 'expired'
        );
        $this->db->where('vendor_id', $data['vendor_id']);
        $this->db->update('memberships', $membership_data);
        $this->db->affected_rows();
        if($data["transaction_id"])
        {
            $memberships_data = array(
                'membership_type' => $data['membership_type'],
                'vendor_id' => $data['vendor_id'],
                'transaction_id' => $data['transaction_id'],
                'added_date' => date('Y-m-d'),
                'status' => 'passive'
            );
        } else {
            $memberships_data = array(
                'membership_type' => $data['membership_type'],
                'vendor_id' => $data['vendor_id'],
                'added_date' => $data['added_date'],
                'expired_date' => $data['expired_date'],
                'status' => 'active'
            );
        }
        
        $this->db->insert('memberships', $memberships_data);

        return $this->db->affected_rows();
    }

    public function insert_bank($data)
    {
        $bank_data = array(
            'bank_name' => $data['bank_name'],
            'holder_name' => $data['holder_name'],
            'iban_no' => $data['iban_no']
        );
        $this->db->insert('bank_accounts', $bank_data);

        return $this->db->affected_rows();
    }

    public function update_memberships_packages($data)
    {
        $membership_data = array(
            'name' => $data['name'],
            'home_limit' => $data['home_limit'],
            'build_limit' => $data['build_limit'],
            'contract_limit' => $data['contract_limit'],
            'amount' => $data['amount'],
            'days' => $data['days'],
        );
        $this->db->where('membership_id', $data['membership_id']);
        $this->db->update('membership_types', $membership_data);

        return $this->db->affected_rows();
    }

    public function update_memberships($data)
    {
        $membership_data = array(
            'membership_type' => $data['membership_type'],
            'vendor_id' => $data['vendor_id'],
            'added_date' => $data['added_date'],
            'expired_date' => $data['expired_date'],
        );
        $this->db->where('id', $data['membership_id']);
        $this->db->update('memberships', $membership_data);

        return $this->db->affected_rows();
    }

    public function get_all_memberships_packages()
    {
        $this->db->select('*');
        $this->db->from('membership_types');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_info($data)
    {
        $this->db->select('*');
        $this->db->from('membership_types');
        $this->db->where('membership_types.membership_id', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_all_vendor()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.user_type', 'Vendor');
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_bank_details()
    {
        $this->db->select('*');
        $this->db->from('bank_accounts');
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function delete_memberships_packages($data)
    {
        $this->db->where('membership_id', $data);
        $this->db->delete('membership_types');

        return $this->db->affected_rows();
    }

    public function delete_memberships($data)
    {
        $this->db->where('id', $data);
        $this->db->delete('memberships');

        return $this->db->affected_rows();
    }

    public function active_memberships($data)
    {
        $membership_data = array(
            'status' => 'active',
        );
        $this->db->where('id', $data);
        $this->db->update('memberships', $membership_data);

        return $this->db->affected_rows();
    }

    public function block_memberships($data)
    {
        $membership_data = array(
            'status' => 'blocked',
        );
        $this->db->where('id', $data);
        $this->db->update('memberships', $membership_data);

        return $this->db->affected_rows();
    }

    public function search_active_membership($user_id)
    {
        $this->db->select('DATEDIFF(expired_date, NOW()) as datediff, DATEDIFF(NOW(), added_date) as addedDateDiff');
        $this->db->from("memberships");
        $this->db->where('vendor_id', $user_id);
        $this->db->where('status', 'active');
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function search_passive_membership($user_id)
    {
        $this->db->select('DATEDIFF(expired_date, NOW()) as datediff, DATEDIFF(NOW(), added_date) as addedDateDiff');
        $this->db->from("memberships");
        $this->db->where('vendor_id', $user_id);
        $this->db->where('status', 'passive');
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function insert_transactions($data)
    {
        $transaction_data = array(
            'membership_type' => $data["membership_type"],
            'payment_type' => $data["payment_type"],
            'amount' => $data["amount"],
            'vendor_id' => $this->session->userdata('user_id'),
            'added_date' => date('Y-m-d')
        );
        $this->db->insert('membership_transactions', $transaction_data);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    public function delete_transactions($data)
    {
        $this->db->where('transaction_id', $data);
        $this->db->delete('membership_transactions');

        return $this->db->affected_rows();
    }

    public function get_active_memberships()
    {
        $this->db->select('*, users.id as user_id, users.username as vendorname, users.fullname as vendorfullname, memberships.id as membership_no, memberships.membership_type as membership_value, membership_types.name as membership_type, memberships.added_date as start_date, memberships.expired_date as expired_date, memberships.status as membership_status');
        $this->db->from('memberships');
        $this->db->join('membership_types', 'membership_types.membership_id = memberships.membership_type');
        $this->db->join('users', 'users.id = memberships.vendor_id');
        $this->db->where('memberships.status', 'active');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_passive_memberships()
    {
        $this->db->select('*, users.id as user_id, users.username as vendorname, users.fullname as vendorfullname, memberships.id as membership_no, memberships.membership_type as membership_value, membership_types.name as membership_type, memberships.added_date as start_date, memberships.expired_date as expired_date, memberships.status as membership_status');
        $this->db->from('memberships');
        $this->db->join('membership_types', 'membership_types.membership_id = memberships.membership_type');
        $this->db->join('users', 'users.id = memberships.vendor_id');
        $this->db->where('memberships.status', 'passive');
        $this->db->or_where('memberships.status', 'blocked');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_expired_memberships()
    {
        $this->db->select('*, users.id as user_id, users.username as vendorname, users.fullname as vendorfullname, memberships.id as membership_no, memberships.membership_type as membership_value, membership_types.name as membership_type, memberships.added_date as start_date, memberships.expired_date as expired_date, memberships.status as membership_status');
        $this->db->from('memberships');
        $this->db->join('membership_types', 'membership_types.membership_id = memberships.membership_type');
        $this->db->join('users', 'users.id = memberships.vendor_id');
        $this->db->where('memberships.status', 'expired');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_transactions()
    {
        $this->db->select('*, membership_types.name as membership_type_name, membership_transactions.amount as transaction_amount, membership_transactions.added_date as transaction_date');
        $this->db->from('membership_transactions');
        $this->db->join('membership_types', 'membership_types.membership_id = membership_transactions.membership_type');
        $this->db->join('users', 'users.id = membership_transactions.vendor_id');
        $result = $this->db->get();

        return $result->result_array();
    }
}
