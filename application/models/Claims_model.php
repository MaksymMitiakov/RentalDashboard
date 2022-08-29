<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Claims_model extends CI_Model
{
    public function __contruct()
    {
        $this->load->database();
    }

    public function login_user($data)
    {
        $userdata = array(
            'username' => $data['username'],
            'password' => sha1($data['password']),
        );

        $query = $this->db->get_where('users', $userdata);
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_active_membership($user_id)
    {
        $this->db->from('memberships');
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
    public function get_num_customers($data)
    {
        $this->db->from('customers');
        $this->db->where('added_user_id', $data);
        $query = $this->db->get();
        $result = $query->num_rows();

        return $result;
    }

    public function get_num_homes($data)
    {
        $this->db->from('homes');
        $this->db->where('added_user_id', $data);
        $query = $this->db->get();
        $result = $query->num_rows();

        return $result;
    }

    public function get_num_buildings($data)
    {
        $this->db->from('buildings');
        $this->db->where('added_user_id', $data);
        $query = $this->db->get();
        $result = $query->num_rows();

        return $result;
    }

    public function get_num_contracts($data)
    {
        $this->db->from('contracts');
        $this->db->where('added_user_id', $data);
        $this->db->or_where('status', 'Approved');
        $this->db->or_where('status', 'Active');
        $query = $this->db->get();
        $result = $query->num_rows();

        return $result;
    }

    public function get_sum_payments($data)
    {
        $this->db->select('SUM(amount) as amnt');
        $this->db->from('contract_transactions');
        $this->db->where('collected_by', $data);
        $this->db->group_by('collected_by');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_sum_total_payments($data)
    {
        $this->db->select('SUM(contract_amount) as amnt');
        $this->db->from('contracts');
        $this->db->where('added_user_id', $data);
        $this->db->group_by('added_user_id');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }





    public function get_account_id()
    {
        $this->db->select('account_no');
        $this->db->from('clients');
        $this->db->order_by('account_no', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_staff()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }



    public function get_due_contract()
    {
        $this->db->where('contracts.id = approved_contracts.contract_id');
        $this->db->where('approved_contracts.status = "new"');
        $this->db->where('DATEDIFF(NOW(), approved_contracts.due_date) >= 0');
        if($this->session->userdata('usertype') != 'Admin')
        {
            $this->db->where('contracts.added_user_id='.$this->session->userdata('user_id'));
        }
        $result = $this->db->get('approved_contracts, contracts');
        return $result->result_array();
    }

    public function get_will_expire()
    {
        $this->db->where('contracts.id = approved_contracts.contract_id');
        $this->db->where('approved_contracts.status = "new"');
        $this->db->where('DATEDIFF(NOW(), approved_contracts.due_date) >= 1');
        $this->db->where('DATEDIFF(NOW(), approved_contracts.due_date) <= 7');
        if($this->session->userdata('usertype') != 'Admin')
        {
            $this->db->where('contracts.added_user_id='.$this->session->userdata('user_id'));
        }
        $result = $this->db->get('approved_contracts, contracts');
        return $result->result_array();
    }

    public function get_incoming_payment()
    {
        $this->db->select('contracts.id as id, contracts.contract_amount as contract_amount, contract_transactions.date as date');
        $this->db->from('contracts');
        $this->db->join('contract_transactions', 'contract_transactions.contract_id=contracts.id');
        $this->db->where('DATEDIFF(NOW(), contract_transactions.date) > 25');
        if($this->session->userdata('usertype') != 'Admin')
        {
            $this->db->where('contracts.added_user_id='.$this->session->userdata('user_id'));
        }
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_user_profile($data)
    {
        $this->db->select('*, users.username as user');
        $this->db->from('users');
        $this->db->where('users.id', $data);
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function remove_staff($data)
    {
        $this->db->where('id', $data);
        $this->db->delete('users');

        return $this->db->affected_rows();
    }

    public function insert_staff($data)
    {
        $this->db->select('MAX(id)+1 as id');
        $this->db->from('users');
        $query = $this->db->get();
        $result = $query->result_array();
        $id = $result[0]['id'];

        $staff = array(
            'username' => $data['username'],
            'password' => sha1($data['password']),
            'id' => $id,
            'user_type' => $data['user_type'],
        );
        $this->db->insert('users', $staff);

        return $this->db->affected_rows();
    }

    public function insert_new_staff($data)
    {
        $this->db->select('MAX(id)+1 as id');
        $this->db->from('users');
        $query = $this->db->get();
        $result = $query->result_array();
        $id = $result[0]['id'];

        $userdata = array(
            'id' => $id,
            'username' => $data['username'],
            'password' => sha1($data['password']),
            'fullname' => $data['fullname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'company' => $data["company"],
            'identity' => $data["identity"],
            'address' => $data["address"],
        );
        $this->db->insert('users', $userdata);

        return $this->db->affected_rows();
    }

    public function update_staff($data)
    {
        $userdata = array(
            'fullname' => $data['fullname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'company' => $data["company"],
            'identity' => $data['identity'],
            'address' => $data['address'],
        );
        $this->db->where('username', $data['username']);
        $this->db->update('users', $userdata);

        return $this->db->affected_rows();
    }

    public function check_staff($data)
    {
        $this->db->where('username', $data);
        $query = $this->db->get('users');
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function create_staff($data)
    {
        $userdata = array(
            'username' => $this->session->userdata('username'),
            'firstname' => $data['fname'],
            'middlename' => $data['mname'],
            'lastname' => $data['lname'],
            'number' => $data['num'],
            'address' => $data['address'].','.$data['city'].',Philippines,'.$data['postal'],
            'email' => $data['email'],
            'position' => $data['position'],
            'bio' => $data['bio'],
        );

        $this->db->insert('staff', $userdata);

        return $this->db->affected_rows();
    }

    public function update_my_profile($data)
    {
        if ($data['img'] == '') {
            $userdata = array(
                'username' => $this->session->userdata('username'),
                'firstname' => $data['fname'],
                'middlename' => $data['mname'],
                'lastname' => $data['lname'],
                'number' => $data['num'],
                'address' => $data['address'],
                'email' => $data['email'],
                'bio' => $data['bio'],
            );
        } else {
            $userdata = array(
                'username' => $this->session->userdata('username'),
                'firstname' => $data['fname'],
                'middlename' => $data['mname'],
                'lastname' => $data['lname'],
                'number' => $data['num'],
                'address' => $data['address'],
                'email' => $data['email'],
                'bio' => $data['bio'],
                'profile_img' => $data['img'],
            );
        }

        $this->db->update('staff', $userdata);

        return $this->db->affected_rows();
    }

    public function create_task($task)
    {
        $data = array(
            'description' => $task['task'],
            'username' => $this->session->userdata('username'),
            'status' => 'Not completed',
        );

        $this->db->insert('task', $data);

        return $this->db->affected_rows();
    }

    public function end_task($task)
    {
        $data = array(
            'status' => 'Completed',
        );

        $this->db->where('task_id', $task['id']);
        $this->db->update('task', $data);

        return $this->db->affected_rows();
    }

    public function update_task($task)
    {
        $data = array(
            'description' => $task['description'],
        );

        $this->db->where('task_id', $task['id']);
        $this->db->update('task', $data);

        return $this->db->affected_rows();
    }

    public function remove_task($task)
    {
        $this->db->where('task_id', $task['id']);
        $this->db->delete('task');

        return $this->db->affected_rows();
    }

    public function get_my_task($data)
    {
        $this->db->where('username', $data);
        $this->db->order_by('status', 'DESC');
        $query = $this->db->get('task');
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_buildings_count($user_id)
    {
        $this->db->select('count(added_user_id) as count');
        $this->db->from('buildings');
        $this->db->where('buildings.added_user_id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_homes_count($user_id)
    {
        $this->db->select('count(added_user_id) as count');
        $this->db->from('homes');
        $this->db->where('homes.added_user_id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_contracts_count($user_id)
    {
        $this->db->select('count(added_user_id) as count');
        $this->db->from('contracts');
        $this->db->where('contracts.added_user_id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_my_membership($user_id)
    {
        $this->db->select('*');
        $this->db->from('memberships');
        $this->db->join('membership_types', 'membership_types.membership_id = memberships.membership_type');
        $this->db->join('users', 'users.id=memberships.vendor_id');
        $this->db->join('membership_transactions', 'membership_transactions.transaction_id=memberships.transaction_id');
        $this->db->where('memberships.vendor_id', $user_id);
        $query = $this->db->get();

        $result = $query->result_array();

        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function account_query($data)
    {
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->where('clients.account_no', $data);

        $query = $this->db->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function change_pass($data)
    {
        $this->db->set('password', sha1($data['new_pass']));
        $this->db->where('username', $data['username']);
        $this->db->update('users');

        return $this->db->affected_rows();
    }
}
