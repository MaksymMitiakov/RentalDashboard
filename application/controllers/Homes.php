<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/MainController.php';

class Homes extends MainController
{
    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function create_homes()
    {
        $this->check_auth('create_homes');
        $title['title'] = $this->lang->line('create_homes');

        //get last id of home
        $account_no = $this->homes_model->get_account_id();

        $homes['buildings'] = $this->homes_model->get_building();
        $homes['rooms'] = $this->homes_model->get_room();
        $homes['heatings'] = $this->homes_model->get_heating();
        $homes['locates'] = $this->homes_model->get_locate();

        if (is_null($account_no)) {
            $homes['acc_no'] = 1000;

            $this->load->view('templates/header', $title);
            $this->load->view('homes/create_homes', $homes);
            $this->load->view('templates/footer');
        } else {
            $homes['acc_no'] = array('id' => $account_no['id']);

            $this->load->view('templates/header', $title);
            $this->load->view('homes/create_homes', $homes);
            $this->load->view('templates/footer');
        }
    }

    public function new_homes()
    {
        $this->check_auth('create_homes');

        $title['title'] = $this->lang->line('new_homes');

        $homes['new_homes'] = $this->homes_model->get_new_homes();
        //var_dump($homes['new_homes']);exit;
        $this->load->view('templates/header', $title);
        $this->load->view('homes/new_homes', $homes);
        $this->load->view('templates/footer');
    }

    public function active_homes()
    {
        $title['title'] = $this->lang->line('active_homes');

        $this->check_auth('active_homes');

        $homes['active'] = $this->homes_model->get_active_homes();

        $this->load->view('templates/header', $title);
        $this->load->view('homes/active_homes', $homes);
        $this->load->view('templates/footer');
    }

    public function homes_info($account_no)
    {
        $this->check_auth('update_homes');
        $title['title'] = $this->lang->line('update_homes');

        //get last id of home

        //$account_no = $this->homes_model->get_account_id();

        $homes['buildings'] = $this->homes_model->get_building();
        $homes['rooms'] = $this->homes_model->get_room();
        $homes['heatings'] = $this->homes_model->get_heating();
        $homes['locates'] = $this->homes_model->get_locate();
        $homes['ids'] = $this->homes_model->get_ids();
        $homes['homeInfo'] = $this->homes_model->get_info($account_no);
        //var_dump($homes['homeInfo']);exit;
        $this->load->view('templates/header', $title);
        $this->load->view('homes/update_homes', $homes);
        $this->load->view('templates/footer');
    }

    public function register_homes()
    {
        $validator = array('success' => false, 'messages' => array());
        $index = 1;
        $images_name = "";

        if($this->session->userdata('usertype') != 'Admin')
        {
            $home_count = $this->homes_model->get_home_count($this->session->userdata("user_id"));
            $home_limit = $this->homes_model->get_home_limit($this->session->userdata("user_id"));
            $home_count = isset($home_count)? $home_count : 0;
           
            if($home_limit)
            {   
                if($home_limit <= $home_count)
                {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line("your_memberships_has_been_expired_please");
                    echo json_encode($validator);
                    return;
                }
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("you_cannot_add_home_please");
                echo json_encode($validator);
                return;
            }
            
        }

        while(true) {
            if(!isSet($_FILES["home_img" . $index]))
                break;
            if( is_dir('./uploads') === false )
            {
                mkdir('./uploads');
            }
            if( is_dir('./uploads/homes') === false )
            {
                mkdir('./uploads/homes');
            }
            if( is_dir('./uploads/homes/thumbs') === false )
            {
                mkdir('./uploads/homes/thumbs');
            }
            $config['upload_path'] = './uploads/homes';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('home_img' . $index)) {
                $data = array('upload_data' => $this->upload->data());
                $path=$data['upload_data']['full_path'];
                //Resize and Compress Image
                $configi['image_library'] = 'gd2';
                $configi['source_image'] = $path;

                $configi['maintain_ratio'] = TRUE;
                $configi['quality'] = '60%';
                $configi['width'] = 250;
                $configi['height'] = 250;
                $configi['new_image'] = './uploads/homes/thumbs/';

                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);
                $this->load->library('image_lib', $configi);
                $this->image_lib->resize();
                $configii['image_library'] = 'gd2';
                $configii['source_image'] = $path;

                $configii['maintain_ratio'] = TRUE;
                $configii['quality'] = '60%';
                $configii['width'] = 600;
                $configii['height'] = 400;
                $configii['new_image'] = './uploads/homes/';

                $this->load->library('image_lib');
                $this->image_lib->initialize($configii);
                $this->load->library('image_lib', $configii);
                $this->image_lib->resize();
                $images_name .= $data['upload_data']['file_name'].":";

            }
            $index++;
        }

        if ($images_name == "") {
            $home_data = array(
                'id' => $this->input->post('id'),
                'home_img' => '',
                'build_id' => $this->input->post('build_id'),
                'room_id' => $this->input->post('room_id'),
                'door_number' => $this->input->post('door_number'),
                'locate_id' => $this->input->post('locate_id'),
                'heating_id' => $this->input->post('heating_id'),
                //'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'gross_meter' => $this->input->post('gross_meter'),
                'net_meter' => $this->input->post('net_meter'),
                'is_balcony' => $this->input->post('is_balcony'),
                'furniture' => $this->input->post('furniture'),
                'using_status' => $this->input->post('using_status'),
                'added_user_id' => $this->session->userdata('user_id'),
                'dues' => $this->input->post('dues'),
                'deposit' => $this->input->post('deposit'),
                'in_site' => $this->input->post('in_site'),
                'status' => $this->input->post('status'),
                //'is_empty' => $this->input->post('is_empty'),
            );

            $insert_data = $this->homes_model->insert_home($home_data);

            if ($insert_data) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('successfully_added');
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("something_went_wrong_please");
            }
        } else {
            $home_data = array(
                'id' => $this->input->post('id'),
                'home_img' => $images_name,
                'build_id' => $this->input->post('build_id'),
                'room_id' => $this->input->post('room_id'),
                'door_number' => $this->input->post('door_number'),
                'locate_id' => $this->input->post('locate_id'),
                'heating_id' => $this->input->post('heating_id'),
                //'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'gross_meter' => $this->input->post('gross_meter'),
                'net_meter' => $this->input->post('net_meter'),
                'is_balcony' => $this->input->post('is_balcony'),
                'added_user_id' => $this->session->userdata('user_id'),
                'furniture' => $this->input->post('furniture'),
                'using_status' => $this->input->post('using_status'),
                'dues' => $this->input->post('dues'),
                'deposit' => $this->input->post('deposit'),
                'in_site' => $this->input->post('in_site'),
              //  'is_empty' => $this->input->post('is_empty'),
            );

            $insert_data = $this->homes_model->insert_home($home_data);

            if ($insert_data) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('successfully_added');
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("something_went_wrong_please");
            }
        }

        echo json_encode($validator);
    }

    public function update_home()
    {
        $validator = array('success' => false, 'messages' => array());
        $index = 1;
        $started = false;
        $images_name = "";

        while(true) {
            if(!isSet($_FILES["home_img" . $index])) {
                if(!$started) {
                    $index++;
                    continue;
                }
                break;
            }
            $started = true;
            if( is_dir('./uploads') === false )
            {
                mkdir('./uploads');
            }
            if( is_dir('./uploads/homes') === false )
            {
                mkdir('./uploads/homes');
            }
            if( is_dir('./uploads/homes/thumbs') === false )
            {
                mkdir('./uploads/homes/thumbs');
            }
            $config['upload_path'] = './uploads/homes';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('home_img' . $index)) {
                $data = array('upload_data' => $this->upload->data());
                $path=$data['upload_data']['full_path'];
                //Resize and Compress Image
                $configi['image_library'] = 'gd2';
                $configi['source_image'] = $path;

                $configi['maintain_ratio'] = TRUE;
                $configi['quality'] = '60%';
                $configi['width'] = 250;
                $configi['height'] = 250;
                $configi['new_image'] = './uploads/homes/thumbs/';

                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);
                $this->load->library('image_lib', $configi);
                $this->image_lib->resize();
                $configii['image_library'] = 'gd2';
                $configii['source_image'] = $path;

                $configii['maintain_ratio'] = TRUE;
                $configii['quality'] = '60%';
                $configii['width'] = 600;
                $configii['height'] = 400;
                $configii['new_image'] = './uploads/homes/';

                $this->load->library('image_lib');
                $this->image_lib->initialize($configii);
                $this->load->library('image_lib', $configii);
                $this->image_lib->resize();
                $images_name .= $data['upload_data']['file_name'].":";

            }
            $index++;
        }

        $oldImages = $this->input->post("oldImages");
        $images_name .= $oldImages;
        if ($images_name == "") {
            $home_data = array(
                'id' => $this->input->post('id'),
                'home_img' => '',
                'build_id' => $this->input->post('build_id'),
                'room_id' => $this->input->post('room_id'),
                'door_number' => $this->input->post('door_number'),
                'locate_id' => $this->input->post('locate_id'),
                'heating_id' => $this->input->post('heating_id'),
              //  'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'gross_meter' => $this->input->post('gross_meter'),
                'net_meter' => $this->input->post('net_meter'),
                'is_balcony' => $this->input->post('is_balcony'),
                'furniture' => $this->input->post('furniture'),
                'using_status' => $this->input->post('using_status'),
                'dues' => $this->input->post('dues'),
                'deposit' => $this->input->post('deposit'),
                'in_site' => $this->input->post('in_site'),
                //'is_empty' => $this->input->post('is_empty'),
                'status' => $this->input->post('status'),
            );

            $update_home = $this->homes_model->update_home($home_data);

            if ($update_home) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('successfully_updated');
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line('something_went_wrong_please');
            }
        } else {

            $home_data = array(
                'id' => $this->input->post('id'),
                'home_img' => $images_name,
                'build_id' => $this->input->post('build_id'),
                'room_id' => $this->input->post('room_id'),
                'door_number' => $this->input->post('door_number'),
                'locate_id' => $this->input->post('locate_id'),
                'heating_id' => $this->input->post('heating_id'),
                //'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'gross_meter' => $this->input->post('gross_meter'),
                'net_meter' => $this->input->post('net_meter'),
                'is_balcony' => $this->input->post('is_balcony'),
                'furniture' => $this->input->post('furniture'),
                'using_status' => $this->input->post('using_status'),
                'dues' => $this->input->post('dues'),
                'deposit' => $this->input->post('deposit'),
                'in_site' => $this->input->post('in_site'),
                //'is_empty' => $this->input->post('is_empty'),
                'status' => $this->input->post('status'),
            );

            $update_home = $this->homes_model->update_home($home_data);
            if ($update_home) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('successfully_updated');
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line('something_went_wrong_please');;
            }
        }

        echo json_encode($validator);
    }

    public function image_delete()
    {
        $id = $this->input->post('id');
        $image = $this->input->post('image').':';
        $result = $this->homes_model->image_delete($id, $image);
        //var_dump($image);exit;
        if ($result) {
            echo $this->lang->line('all_records_has_been_deleted');
        } else {
            echo $this->lang->line('false');
        }
    }

    public function delete_homes()
    {
        $result = $this->homes_model->delete_homes($this->input->post('id'));
        //var_dump($this->input->post('id'));exit;
        if ($result) {
            echo $this->lang->line('all_records_has_been_deleted');
        } else {
            echo $this->lang->line('false');
        }
    }
}
