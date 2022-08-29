<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buildings_model extends CI_Model
{
    public function __contruct()
    {
        $this->load->database();
    }

    public function insert_building($data)
    {
        if ($data['build_img'] == '') {
            $building_data = array(
                'id' => $data['id'],
                'build_img' => $data['build_img'],
                'name' => $data['name'],
                'type_id' => $data['type_id'],
                'added_user_id' => $this->session->userdata('user_id'),
                'room_id' => $data['room_id'],
                'floor_id' => $data['floor_id'],
                'age_id' => $data['age_id'],
                'city_id' => $data['city_id'],
                'district_id' => $data['district_id'],
                'post_code' => $data['post_code'],
                'address' => $data['address'],
            );
        } else {
            $building_data = array(
                'id' => $data['id'],
                'build_img' => $data['build_img'],
                'name' => $data['name'],
                'type_id' => $data['type_id'],
                'added_user_id' => $this->session->userdata('user_id'),
                'room_id' => $data['room_id'],
                'floor_id' => $data['floor_id'],
                'age_id' => $data['age_id'],
                'city_id' => $data['city_id'],
                'district_id' => $data['district_id'],
                'post_code' => $data['post_code'],
                'address' => $data['address'],
            );
        }
        $this->db->insert('buildings', $building_data);

        return $this->db->affected_rows();
    }

    public function get_city_district($city_id)
    {
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where('city_id', $city_id);
        $this->db->where('status', '1');
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_buildings_count($user_id)
    {
        $this->db->select('count(*) as count');
        $this->db->from('buildings');
        $this->db->where('added_user_id', $user_id);
        
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]["count"];
        } else {
            return null;
        }
    }

    public function get_buildings_limit($user_id)
    {
        $this->db->select('SUM(membership_types.build_limit) as buildlimit');
        $this->db->from('memberships');
        $this->db->join('membership_types', 'membership_types.membership_id = memberships.membership_type');
        $this->db->where('memberships.vendor_id', $user_id);
        //$this->db->where('memberships.status', 'active');
        
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]["buildlimit"];
        } else {
            return null;
        }
    }

    public function update_building_info($data)
    {
        if (empty($data['build_img'])) {
            $building_data = array(
                'id' => $data['id'],
                'name' => $data['name'],
                'type_id' => $data['type_id'],
                'room_id' => $data['room_id'],
                'floor_id' => $data['floor_id'],
                'age_id' => $data['age_id'],
                'updated_user_id' => $this->session->userdata('user_id'),
                'updated_date' => 'NOW()',
                'city_id' => $data['city_id'],
                'district_id' => $data['district_id'],
                'post_code' => $data['post_code'],
                'address' => $data['address'],
            );
        } else {
            $building_data = array(
                'id' => $data['id'],
                'build_img' => $data['build_img'],
                'name' => $data['name'],
                'type_id' => $data['type_id'],
                'room_id' => $data['room_id'],
                'floor_id' => $data['floor_id'],
                'age_id' => $data['age_id'],
                'updated_user_id' => $this->session->userdata('user_id'),
                'updated_date' => 'NOW()',
                'city_id' => $data['city_id'],
                'district_id' => $data['district_id'],
                'post_code' => $data['post_code'],
                'address' => $data['address'],
            );
        }

        $this->db->where('id', $data['id']);
        $this->db->update('buildings', $building_data);

        return $this->db->affected_rows();
    }

    public function get_id()
    {
        $this->db->select('id');
        $this->db->from('buildings');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function get_new_buildings()
    {
        $this->db->select('*, buildings.id as ids, buildings.name as names, buildings.status as sta, cities.name as city, districts.name as district, building_ages.name as age, building_rooms.name as room, building_floors.name as floor, building_types.name as type');
        $this->db->from('buildings');
        $this->db->join('cities', 'buildings.city_id = cities.id');
        $this->db->join('districts', 'buildings.district_id = districts.id');
        $this->db->join('building_ages', 'buildings.age_id = building_ages.id');
        $this->db->join('building_rooms', 'buildings.room_id = building_rooms.id');
        $this->db->join('building_types', 'buildings.type_id = building_types.id');
        $this->db->join('building_floors', 'buildings.floor_id = building_floors.id');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('added_user_id', $this->session->userdata('user_id'));
        }
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_buildings_ids()
    {
        $this->db->select('id');
        $this->db->from('buildings');
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('added_user_id', $this->session->userdata('user_id'));
        }
        $this->db->order_by('id', '');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function get_building_info($data)
    {
        $this->db->select('*, buildings.id As buildingID, buildings.name buildingName');
        $this->db->from('buildings');
        $this->db->join('cities', 'buildings.city_id = cities.id');
        $this->db->join('districts', 'buildings.district_id = districts.id');
        $this->db->join('building_ages', 'buildings.age_id = building_ages.id');
        $this->db->join('building_rooms', 'buildings.room_id = building_rooms.id');
        $this->db->join('building_types', 'buildings.type_id = building_types.id');
        $this->db->join('building_floors', 'buildings.floor_id = building_floors.id');
        $this->db->where('buildings.id', $data);
        if ($this->session->userdata('usertype') != 'Admin') {
            $this->db->where('buildings.added_user_id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();

        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function delete_buildings($data)
    {
        $this->db->where('id', $data);
        $this->db->delete('buildings');

        return $this->db->affected_rows();
    }

    public function get_city()
    {
        $this->db->select('*');
        $this->db->from('cities');
        $query = $this->db->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_district()
    {
        $this->db->select('*');
        $this->db->from('districts');
        $query = $this->db->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_age()
    {
        $this->db->select('*');
        $this->db->from('building_ages');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_room()
    {
        $this->db->select('*');
        $this->db->from('building_rooms');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_type()
    {
        $this->db->select('*');
        $this->db->from('building_types');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_floor()
    {
        $this->db->select('*');
        $this->db->from('building_floors');
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
}
