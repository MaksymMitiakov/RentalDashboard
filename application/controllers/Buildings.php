<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/MainController.php';

class Buildings extends MainController
{
    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function create_buildings()
    {
        $this->check_auth('create_buildings');

        $title['title'] = $this->lang->line('create_buildings_information');

        //get last account_no of client
        $account_no = $this->buildings_model->get_id();

        $buildings['cities'] = $this->buildings_model->get_city();
        $buildings['districts'] = $this->buildings_model->get_district();
        $buildings['rooms'] = $this->buildings_model->get_room();
        $buildings['types'] = $this->buildings_model->get_type();
        $buildings['floors'] = $this->buildings_model->get_floor();
        $buildings['ages'] = $this->buildings_model->get_age();

        if (is_null($account_no)) {
            $buildings['ids'] = 1000;

            $this->load->view('templates/header', $title);
            $this->load->view('buildings/create_buildings', $buildings);
            $this->load->view('templates/footer');
        } else {
            $buildings['ids'] = array('id' => $account_no['id']);

            $this->load->view('templates/header', $title);
            $this->load->view('buildings/create_buildings', $buildings);
            $this->load->view('templates/footer');
        }
    }

    public function get_city_district()
    {
        $city_id = $this->input->post('city_id');
        $district_info = $this->buildings_model->get_city_district($city_id);
        echo json_encode($district_info);
    }

    public function register_buildings()
    {
        $validator = array('success' => false, 'messages' => array());
        if( is_dir('./uploads') === false )
        {
            mkdir('./uploads');
        }
        if( is_dir('./uploads/buildings') === false )
        {
            mkdir('./uploads/buildings');
        }
       
        $config['upload_path'] = './uploads/buildings/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = true;

        if($this->session->userdata('usertype') != 'Admin')
        {
            $building_count = $this->buildings_model->get_buildings_count($this->session->userdata("user_id"));
            $building_limit = $this->buildings_model->get_buildings_limit($this->session->userdata("user_id"));
            $building_count = isset($building_count)? $building_count : 0;
            
            if($building_limit)
            {   
                if($building_limit <= $building_count)
                {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line("your_memberships_has_been_expired_please");
                    echo json_encode($validator);
                    return;
                }
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("you_cannot_add_buildings_please");
                echo json_encode($validator);
                return;
            }
            
        }
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('build_img')) {
            $building_data = array(
                'id' => $this->input->post('id'),
                'build_img' => '',
                'name' => $this->input->post('name'),
                'city_id' => $this->input->post('city_id'),
                'district_id' => $this->input->post('district_id'),
                'address' => $this->input->post('address'),
                'type_id' => $this->input->post('type_id'),
                'floor_id' => $this->input->post('floor_id'),
                'room_id' => $this->input->post('room_id'),
                'age_id' => $this->input->post('age_id'),
                'post_code' => $this->input->post('post_code'),
            );

            $insert_data = $this->buildings_model->insert_building($building_data);

            if ($insert_data) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line("successfully_added");
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("something_went_wrong_please");
            }
        } else {
            $data = $this->upload->data();
            //Resize and Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/buildings/'.$data['file_name'];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['quality'] = '60%';
            $config['width'] = 600;
            $config['height'] = 400;
            $config['new_image'] = './uploads/buildings/'.$data['file_name'];

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $building_data = array(
                'id' => $this->input->post('id'),
                'build_img' => $data['file_name'],
                'name' => $this->input->post('name'),
                'city_id' => $this->input->post('city_id'),
                'district_id' => $this->input->post('district_id'),
                'address' => $this->input->post('address'),
                'type_id' => $this->input->post('type_id'),
                'floor_id' => $this->input->post('floor_id'),
                'room_id' => $this->input->post('room_id'),
                'age_id' => $this->input->post('age_id'),
                'post_code' => $this->input->post('post_code'),
            );

            $insert_data = $this->buildings_model->insert_building($building_data);

            if ($insert_data) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line("successfully_added");
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("something_went_wrong_please");
            }
        }
        echo json_encode($validator);
    }

    public function new_buildings()
    {
        $this->check_auth('new_buildings');

        $title['title'] = $this->lang->line("new_buildings");

        $buildings['new_buildings'] = $this->buildings_model->get_new_buildings();
        $buildings['cities'] = $this->buildings_model->get_city();
        $buildings['districts'] = $this->buildings_model->get_district();
        $buildings['rooms'] = $this->buildings_model->get_room();
        $buildings['types'] = $this->buildings_model->get_type();
        $buildings['floors'] = $this->buildings_model->get_floor();
        $buildings['ages'] = $this->buildings_model->get_age();

        $this->load->view('templates/header', $title);
        $this->load->view('buildings/new_buildings', $buildings);
        $this->load->view('templates/footer');
    }

    public function buildings_info($account_no)
    {
        $this->check_auth('buildings_info');

        $result = $this->buildings_model->get_building_info($account_no);

        if (!is_null($result)) {
            $building['info'] = array(
                'id' => $result['id'],
                'build_img' => $result['build_img'],
                'name' => $result['name'],
                'city_id' => $result['city_id'],
                'district_id' => $result['district_id'],
                'room_id' => $result['room_id'],
                'floor_id' => $result['floor_id'],
                'type_id' => $result['type_id'],
                'age_id' => $result['age_id'],
                'post_code' => $result['post_code'],
                'address' => $result['address'],
            );

            $title['title'] = $this->lang->line('info').$result['name'];

            $this->load->view('templates/header', $title);
            $this->load->view('buildings/buildings', $building);
            $this->load->view('templates/footer');
        } else {
            redirect(base_url('error404'));
        }
    }

    public function update_buildings($id)
    {
        $this->check_auth('update_buildings');

        $title['title'] = $this->lang->line('update_buildings');

        $buildings['new_buildings'] = $this->buildings_model->get_new_buildings();
        $buildings['ids'] = $this->buildings_model->get_buildings_ids();
        $buildings['cities'] = $this->buildings_model->get_city();
        $buildings['districts'] = $this->buildings_model->get_district();
        $buildings['rooms'] = $this->buildings_model->get_room();
        $buildings['types'] = $this->buildings_model->get_type();
        $buildings['floors'] = $this->buildings_model->get_floor();
        $buildings['ages'] = $this->buildings_model->get_age();

        if ($id) {
            $buildings['selectedBuilding'] = $this->buildings_model->get_building_info($id);
        }
        //var_dump($buildings['selectedBuilding']);exit;
        $this->load->view('templates/header', $title);
        $this->load->view('buildings/update_buildings', $buildings);
        $this->load->view('templates/footer');
    }

    public function building_update()
    {
        $validator = array('success' => false, 'messages' => array());
        if( is_dir('./uploads') === false )
        {
            mkdir('./uploads');
        }
        if( is_dir('./uploads/buildings') === false )
        {
            mkdir('./uploads/buildings');
        }
        $config['upload_path'] = './uploads/buildings/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('build_img')) {
            $building_data = array(
                'id' => $this->input->post('buildingid'),
                'build_img' => '',
                'name' => $this->input->post('name'),
                'city_id' => $this->input->post('city_id'),
                'district_id' => $this->input->post('district_id'),
                'address' => $this->input->post('address'),
                'type_id' => $this->input->post('type_id'),
                'floor_id' => $this->input->post('floor_id'),
                'room_id' => $this->input->post('room_id'),
                'age_id' => $this->input->post('age_id'),
                'post_code' => $this->input->post('post_code'),
            );

            $insert_data = $this->buildings_model->update_building_info($building_data);
            
            if ($insert_data) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('successfully_updated');
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line('something_went_wrong_please');
            }
        } else {
            $data = $this->upload->data();
            //Resize and Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/buildings/'.$data['file_name'];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['quality'] = '60%';
            $config['width'] = 600;
            $config['height'] = 400;
            $config['new_image'] = './uploads/buildings/'.$data['file_name'];

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $building_data = array(
                'id' => $this->input->post('buildingid'),
                'build_img' => $data['file_name'],
                'name' => $this->input->post('name'),
                'city_id' => $this->input->post('city_id'),
                'district_id' => $this->input->post('district_id'),
                'address' => $this->input->post('address'),
                'type_id' => $this->input->post('type_id'),
                'floor_id' => $this->input->post('floor_id'),
                'room_id' => $this->input->post('room_id'),
                'age_id' => $this->input->post('age_id'),
                'post_code' => $this->input->post('post_code'),
            );

            $insert_data = $this->buildings_model->update_building_info($building_data);

            if ($insert_data) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line("successfully_updated");
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("something_went_wrong_please");
            }
        }
        echo json_encode($validator);
    }

    public function delete_buildings()
    {
        $result = $this->buildings_model->delete_buildings($this->input->post('id'));
        if ($result) {
            echo 'All building records has been deleted!';
        } else {
            echo 'False';
        }
    }
}
