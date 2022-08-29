<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contract_model extends CI_Model
{
    public function __contruct()
    {
        $this->load->database();
    }

    public function get_contract_no()
    {
        $this->db->select('id');
        $this->db->from('contracts');
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_paid_contract()
    {
        $this->db->select('*, customers.id as ids, contracts.id as contract_no, approved_contracts.status as approved_status');
        $this->db->from('customers');
        $this->db->join('contracts', 'contracts.customer_id = customers.id');
        $this->db->join('approved_contracts', 'contracts.id = approved_contracts.contract_id');
        $this->db->where('approved_contracts.status', 'Paid');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_verifier()
    {
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('user_type', 'Vendors');

        $query = $this->db->get();

        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_customer_info($customer_id)
    {
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('id', $customer_id);
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_building_homeinfo($building_id)
    {
        $this->db->select('*');
        $this->db->from('homes');
        $this->db->where('build_id', $building_id);
      //  $this->db->where('using_status', 'Empty');
        $this->db->where('status', 'New');
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_customer()
    {
        $this->db->select('*');
        $this->db->from('customers');
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

    public function get_home_info($home_id)
    {
        $this->db->select('homes.*, homes.id AS homeid, homes.status as sta, home_rooms.name as room,
		home_locates.name as locate, buildings.name as build, buildings.address as buildAddress');
        $this->db->from('homes');
        $this->db->join('home_rooms', 'home_rooms.id = homes.room_id');
        $this->db->join('home_locates', 'home_locates.id = homes.locate_id');
        $this->db->join('buildings', 'buildings.id = homes.build_id');
        $this->db->where('homes.id', $home_id);
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function insert_guarantor($data)
    {
        $guarantor_data = array(
            'gua_name' => $data["gua_fullname"],
            'gua_identity' => $data["gua_identity"],
            'gua_phone' => $data["gua_phone"]
        );
        $this->db->insert('guarantors', $guarantor_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function get_building()
    {
        $this->db->select('*');
        $this->db->from('buildings');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('buildings.added_user_id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_home()
    {
        $this->db->select('*');
        $this->db->from('homes');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('homes.added_user_id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_contract_count($user_id)
    {
        $this->db->select('count(*) as count');
        $this->db->from('contracts');
        $this->db->where('added_user_id', $user_id);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]["count"];
        } else {
            return null;
        }
    }

    public function get_contract_limit($user_id)
    {
        $this->db->select('SUM(membership_types.contract_limit) as contractlimit');
        $this->db->from('memberships');
        $this->db->join('membership_types', 'membership_types.membership_id = memberships.membership_type');
        $this->db->where('memberships.vendor_id', $user_id);
        //$this->db->where('memberships.status', 'active');

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]["contractlimit"];
        } else {
            return null;
        }
    }

    public function insert_contract($data, $gua_id)
    {
        $this->db->set('status', 'Active');
        $this->db->where('id', $data['home_id']);
        $this->db->update('homes');

        $contract = array(
            'id' => $data['id'],
            'customer_id' => $data['customer_id'],
            'building_id' => $data['building_id'],
            'home_id' => $data['home_id'],
            //'area' => $data['area'],
            'contract_amount' => $data['contract_amount'],
            'date_contract' => $data['date_contract'],
            'added_user_id' => $this->session->userdata('user_id'),
            //'collector_id' => $data['collector_id'],
            //'verified' => $data['verified']
            'guarantor_id' => $gua_id
        );

        $this->db->insert('contracts', $contract);

        return $this->db->affected_rows();
    }

    public function insert_co_maker($data)
    {
        for ($i = 0; $i < count($data['co_maker_name']); ++$i) {
            $co_data = array(
                'name' => $data['co_maker_name'][$i],
                'cedula_no' => $data['cedula'][$i],
                'date_issued' => $data['date_issued'][$i],
                'address_issued' => $data['adrs_issued'][$i],
                'loan_no' => $data['loan_no'],
                'account_no' => $data['account_no'],
            );

            $this->db->insert('co_maker', $co_data);
        }

        return $this->db->affected_rows();
    }

    public function update_customers($data)
    {
        $this->db->set('status', 'Verified');
        $this->db->where('id', $data);
        $this->db->update('customers');

        return $this->db->affected_rows();
    }

    public function get_approved_customers()
    {
        $this->db->select('*, customers.id as ids,  contracts.status as contract_status');
        $this->db->from('customers');
        $this->db->join('contracts', 'contracts.customer_id = customers.id');
        $this->db->join('approved_contracts', 'contracts.id = approved_contracts.contract_id');

        $st = "(contracts.status='Approved' OR contracts.status='Active')";
        $this->db->where($st, null, false);
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $this->db->group_by('contracts.id');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_rejected_customers()
    {
        $this->db->select('*, customers.id as ids, contracts.status as sta');
        $this->db->from('customers');
        $this->db->join('contracts', 'contracts.customer_id = customers.id');
        $this->db->where('contracts.status', 'Rejected');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_verified_customers()
    {
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->join('contracts', 'contracts.customer_id = customers.id');

        $st = "(contracts.status='Waiting for approval' OR contracts.status='Re-applied contract')";
        $this->db->where($st, null, false);

        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('customers.added_user_id', $this->session->userdata('user_id'));
        }
        $result = $this->db->get();

        return $result->result_array();
    }

    public function approve_contract($data, $data1)
    {
        $approved_date = date('Y-m-d');

        $due_date = date('Y-m-d', strtotime('+365 days'));

        $amount = intval($data1);
        $int = $amount * 0.1;
        $total_int = $int * 2;
        $amnt_int = $amount + $total_int;
        $monthly_payment = $amount / 12;

        $this->db->set('status', 'Approved');
        $this->db->set('approved', $this->session->userdata('username'));
        $this->db->where('id', $data);
        $this->db->update('contracts');

        $contract_data = array(
            'contract_id' => $data,
            'date_approved' => $approved_date,
            'monthly_payment' => $monthly_payment,
        );

        $this->db->insert('approved_contracts', $contract_data);

        return $this->db->affected_rows();
    }

    public function get_promissory_customer($data)
    {
        $this->db->where('customers.id', $data);

        $query = $this->db->get('customers');

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_promissory_building($data)
    {
        $this->db->where('buildings.id', $data);

        $query = $this->db->get('buildings');

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function get_promissory_home($data)
    {
        $this->db->where('homes.id', $data);

        $query = $this->db->get('homes');

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_promissory_city($data)
    {   $this->db->select('*, cities.name as city');
        $this->db->from('cities');
        $this->db->join('buildings', 'cities.id = buildings.city_id');
        $this->db->where('buildings.id', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_promissory_district($data)
    {
      $this->db->select('*, districts.name as district');
        $this->db->from('districts');
        $this->db->join('buildings', 'districts.id = buildings.district_id');
        $this->db->where('buildings.id', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function get_promissory_guarantor($data)
    {
      $this->db->select('*');
        $this->db->from('guarantors');
        $this->db->where('guarantors.gua_id', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_promissory_type($data)
    {
      $this->db->select('*, building_types.name as type');
        $this->db->from('building_types');
        $this->db->join('buildings', 'building_types.id = buildings.type_id');
        $this->db->where('buildings.id', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_promissory_transaction($data)
    {
      $this->db->select('*, transaction_types.name as typ, contract_transactions.date as dates');
        $this->db->from('contract_transactions');
        $this->db->join('transaction_types', 'contract_transactions.payment_type = transaction_types.id');
        $this->db->where('contract_transactions.contract_id', $data);
        $this->db->order_by("contract_transactions.contract_id", "desc");
      $this->db->limit(1);

        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }

    }

    public function get_promissory_approve($data)
    {
      $this->db->where('approved_contracts.contract_id', $data);

      $query = $this->db->get('approved_contracts');

      $result = $query->result_array();
      if (count($result) > 0) {
          return $result;
      } else {
          return null;
      }
    }
    public function get_contract_details($data)
    {
        $sql = "SELECT *, customers.fullname as fullName, customers.phone as tel, contracts.contract_amount as amount, contracts.id as ids, customers.email as mails FROM contracts, customers  WHERE contracts.customer_id=customers.id and contracts.id= '$data' ";
        $query = $this->db->query($sql);

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function reject_contract($data, $data1)
    {
        if (empty($data1)) {
            $data1 = 'No reason given';
        }
        $this->db->set('reason', $data1);
        $this->db->set('status', 'Rejected');
        $this->db->set('approved', $this->session->userdata('username'));
        $this->db->where('id', $data);
        $this->db->update('contracts');

        return $this->db->affected_rows();
    }

    public function remove_contract($data)
    {
        $this->db->where('id', $data);
        $this->db->delete('contracts');

        return $this->db->affected_rows();
    }

    public function cash_recieve2($data)
    {
        $contract_start = date('Y-m-d');
        $due_date = date('Y-m-d', strtotime('+365 days'));

        $this->db->set('contract_started', $contract_start);
        $this->db->set('due_date', $due_date);
        $this->db->where('contract_id', $data);
        $this->db->update('approved_contracts');

        return $this->db->affected_rows();
    }

    public function status_update($data)
    {
        $this->db->set('status', 'Active');
        $this->db->where('id', $data);
        $this->db->update('contracts');

        return $this->db->affected_rows();
    }

    public function reapply_contract($data)
    {
        $this->db->set('reason', null);
        $this->db->set('status', 'Re-applied contract');
        $this->db->set('approved', null);
        $this->db->where('id', $data);
        $this->db->update('contracts');

        return $this->db->affected_rows();
    }
}
