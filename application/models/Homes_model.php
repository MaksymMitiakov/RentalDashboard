<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Homes_model extends CI_Model
{
    public function __contruct()
    {
        $this->load->database();
    }

    public function get_home_count($user_id)
    {
        $this->db->select('count(*) as count');
        $this->db->from('homes');
        $this->db->where('added_user_id', $user_id);

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]["count"];
        } else {
            return null;
        }
    }

    public function get_home_limit($user_id)
    {
        $this->db->select('SUM(membership_types.home_limit) as homelimit');
        $this->db->from('memberships');
        $this->db->join('membership_types', 'membership_types.membership_id = memberships.membership_type');
        $this->db->where('memberships.vendor_id', $user_id);
        //$this->db->where('memberships.status', 'active');

        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]["homelimit"];
        } else {
            return null;
        }
    }

    public function insert_home($data)
    {
        if ($data['home_img'] == '') {
            $home_data = array(
                'id' => $data['id'],
                'build_id' => $data['build_id'],
                'room_id' => $data['room_id'],
                'door_number' => $data['door_number'],
                'locate_id' => $data['locate_id'],
                'heating_id' => $data['heating_id'],
                //'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'gross_meter' => $data['gross_meter'],
                'net_meter' => $data['net_meter'],
                'is_balcony' => $data['is_balcony'],
                'furniture' => $data['furniture'],
                'using_status' => $data['using_status'],
                'added_user_id' => $this->session->userdata('user_id'),
                'dues' => $data['dues'],
                'deposit' => $data['deposit'],
                'in_site' => $data['in_site'],
                //'is_empty' => $data['is_empty'],
            );
        } else {
            $home_data = array(
                'id' => $data['id'],
                'home_img' => $data['home_img'].':',
                'build_id' => $data['build_id'],
                'room_id' => $data['room_id'],
                'door_number' => $data['door_number'],
                'locate_id' => $data['locate_id'],
                'heating_id' => $data['heating_id'],
                //'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'gross_meter' => $data['gross_meter'],
                'net_meter' => $data['net_meter'],
                'is_balcony' => $data['is_balcony'],
                'furniture' => $data['furniture'],
                'using_status' => $data['using_status'],
                'added_user_id' => $this->session->userdata('user_id'),
                'dues' => $data['dues'],
                'deposit' => $data['deposit'],
                'in_site' => $data['in_site'],
                //'is_empty' => $data['is_empty'],
            );
        }
        $this->db->insert('homes', $home_data);

        return $this->db->affected_rows();
    }

    public function update_home($data)
    {
        if (empty($data['home_img'])) {
            $home_data = array(
                'build_id' => $data['build_id'],
                'room_id' => $data['room_id'],
                'door_number' => $data['door_number'],
                'locate_id' => $data['locate_id'],
                'heating_id' => $data['heating_id'],
                //'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'gross_meter' => $data['gross_meter'],
                'net_meter' => $data['net_meter'],
                'is_balcony' => $data['is_balcony'],
                'updated_user_id' => $this->session->userdata('user_id'),
                'furniture' => $data['furniture'],
                'using_status' => $data['using_status'],
                'dues' => $data['dues'],
                'deposit' => $data['deposit'],
                'in_site' => $data['in_site'],
                //'is_empty' => $data['is_empty'],
            );
        } else {
            $home_data = array(
                'home_img' => $data['home_img'],
                'build_id' => $data['build_id'],
                'room_id' => $data['room_id'],
                'door_number' => $data['door_number'],
                'locate_id' => $data['locate_id'],
                'heating_id' => $data['heating_id'],
                //'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'gross_meter' => $data['gross_meter'],
                'net_meter' => $data['net_meter'],
                'is_balcony' => $data['is_balcony'],
                'furniture' => $data['furniture'],
                'updated_user_id' => $this->session->userdata('user_id'),
                'using_status' => $data['using_status'],
                'dues' => $data['dues'],
                'deposit' => $data['deposit'],
                'in_site' => $data['in_site'],
                //'is_empty' => $data['is_empty'],
            );
        }

        $this->db->where('id', $data['id']);
        $this->db->update('homes', $home_data);

        return $this->db->affected_rows();
    }

    public function image_delete($id, $image)
    {
        $oldimage = $this->old_home_img($id);
        $newimage = str_replace($image, '', $oldimage['home_img']);
        $home_data = array(
            'home_img' => $newimage,
        );
        $this->db->where('id', $id);
        $this->db->update('homes', $home_data);
        //var_dump($this->db->query()); exit;
        return $this->db->affected_rows();
    }

    public function old_home_img($id)
    {
        $this->db->select('home_img');
        $this->db->from('homes');
        $this->db->where('homes.id', $id);

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
        $this->db->select('id');
        $this->db->from('homes');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_new_homes()
    {
        $this->db->select('homes.*,  homes.id as ids, homes.status as sta, home_rooms.name as room,
				home_locates.name as locate, home_heatings.name as heating, buildings.name as build, buildings.address as buildAddress');
        $this->db->from('homes');
        $this->db->join('home_rooms', 'home_rooms.id = homes.room_id');
        $this->db->join('home_locates', 'home_locates.id = homes.locate_id');
        $this->db->join('home_heatings', 'home_heatings.id = homes.heating_id');
        $this->db->join('buildings', 'buildings.id = homes.build_id');
        $this->db->where('homes.status', 'New');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('homes.added_user_id', $this->session->userdata('user_id'));
        }
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_active_homes()
    {
        $this->db->select('homes.*, homes.id as ids, homes.status as sta, home_rooms.name as room,
		home_locates.name as locate, buildings.name as build, buildings.address as buildAddress');
        $this->db->from('homes');
        $this->db->join('home_rooms', 'home_rooms.id = homes.room_id');
        $this->db->join('home_locates', 'home_locates.id = homes.locate_id');
        $this->db->join('buildings', 'buildings.id = homes.build_id');
        $this->db->where('homes.status', 'Active');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('homes.added_user_id', $this->session->userdata('user_id'));
        }
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_info($data)
    {
        $this->db->select('homes.*, homes.id AS homeid, homes.status as sta, home_rooms.name as room,
		home_locates.name as locate, buildings.name as build, buildings.address as buildAddress');
        $this->db->from('homes');
        $this->db->join('home_rooms', 'home_rooms.id = homes.room_id');
        $this->db->join('home_locates', 'home_locates.id = homes.locate_id');
        $this->db->join('buildings', 'buildings.id = homes.build_id');
        $this->db->where('homes.id', $data);
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('homes.added_user_id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_ids()
    {
        $this->db->select('id');
        $this->db->from('homes');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('homes.added_user_id', $this->session->userdata('user_id'));
        }
        $this->db->order_by('id', '');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function delete_homes($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('homes');

        return $this->db->affected_rows();
    }

    public function get_room()
    {
        $this->db->select('*');
        $this->db->from('home_rooms');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_locate()
    {
        $this->db->select('*');
        $this->db->from('home_locates');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_heating()
    {
        $this->db->select('*');
        $this->db->from('home_heatings');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
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

    public function delete_clients($data)
    {
        $this->db->where('account_no', $data);
        $this->db->delete('clients');

        return $this->db->affected_rows();
    }
}
