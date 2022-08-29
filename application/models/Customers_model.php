<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    public function __contruct()
    {
        $this->load->database();
    }

    public function insert_customer($data)
    {
        $customer_data = array(
            'id' => $data['id'],
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'identity' => $data['identity'],
            'added_user_id' => $this->session->userdata('user_id'),
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'education_id' => $data['education_id'],
            'job_id' => $data['job_id'],
            'phone2' => $data['phone2'],
        );
        $this->db->insert('customers', $customer_data);

        return $this->db->affected_rows();
    }

    public function update_profile($data)
    {
        $customer_data = array(
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'phone2' => $data['phone2'],
            //'identity' => $data['identity'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'updated_user_id' => $this->session->userdata('user_id'),
            //'education_id' => $data['education_id'],
            //'job_id' => $data['job_id'],
        );
        $this->db->where('id', $data['id']);
        $this->db->update('customers', $customer_data);

        return $this->db->affected_rows();
    }

    public function get_account_id()
    {
        $this->db->select('id');
        $this->db->from('customers');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_new_customers()
    {
        $this->db->select('*, customers.id as ids, customers.status as sta, customer_educations.name as edu, customer_jobs.name as job');
        $this->db->from('customers');
        $this->db->join('customer_educations', 'customers.education_id = customer_educations.id');
        $this->db->join('customer_jobs', 'customers.job_id = customer_jobs.id');

        $st = "(customers.status='New' OR customers.status='Verified')";
        $this->db->where($st, null, false);
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_active_customers()
    {
        $this->db->select('*, customers.id as ids, contracts.id as contract_id, contracts.status as sta');
        $this->db->from('customers');
        $this->db->join('contracts', 'contracts.customer_id = customers.id');

        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_profile($data)
    {
        $this->db->select('*,customers.id as ids, customer_educations.name as education, customer_jobs.name as job');
        $this->db->from('customers');
        $this->db->join('customer_educations', 'customers.education_id = customer_educations.id');
        $this->db->join('customer_jobs', 'customers.job_id = customer_jobs.id');
        $this->db->where('customers.id', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_jobs()
    {
        $this->db->select('*');
        $this->db->from('customer_jobs');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_educations()
    {
        $this->db->select('*');
        $this->db->from('customer_educations');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_contract($data)
    {
        $this->db->select('*, contracts.status as contract_stat');
        $this->db->from('contracts');
        $this->db->join('approved_contracts', 'approved_contracts.contract_id=contracts.id');
        $this->db->where('contracts.customer_id', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function delete_customers($data)
    {
        $this->db->where('id', $data);
        $this->db->delete('customers');

        return $this->db->affected_rows();
    }
}
