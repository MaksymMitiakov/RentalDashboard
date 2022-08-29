<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'core/MainController.php';

class Claims_controller extends MainController
{
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('claims_controller/dashboard');
        }

        $title['title'] = $this->lang->line('mobsy_login');
        $this->load->view('templates/header', $title);
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $validator = array('success' => false, 'messages' => array());

        $login_data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );

        $data = $this->claims_model->login_user($login_data);
        
        if (!is_null($data)) {
            $membership_status = $this->claims_model->get_active_membership($data['id']);
            if($membership_status && $membership_status['membership_type'] > 0)
            {
                $status = true;
            } else {
                $status = false;
            }
       
            $login_data = array(
                'username' => $data['username'],
                'password' => $data['password'],
                'fullname' => $data['fullname'],
                'email' => $data['email'],
                'address' => $data['address'],
                'company' => $data['company'],
                'identity' => $data['identity'],
                'usertype' => $data['user_type'],
                'user_id' => $data['id'],
                'logged_in' => true,
                'status' => $status
            );

            $this->session->set_userdata($login_data);

            if ($data['user_type'] == 'Guest') {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line("guest");
            } else if ($data['user_type'] == 'Cashier') {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('cashier');
            } else if ($data['user_type'] == 'Manager') {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('manager');
            } else {
                $validator['success'] = true;
                if($data['user_type'] == 'Vendor' && $status == false)
                    $validator['messages'] = 'membershiplans';
                else 
                    $validator['messages'] = 'dashboard';
            }
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("incorrect_username_or_password_please");
        }

        echo json_encode($validator);
    }

    public function error404()
    {
        $this->load->view('templates/header');
        $this->load->view('error404');
        $this->load->view('templates/footer');
    }

    //function to check if user is in session
    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function dashboard()
    {
        $title['title'] = $this->lang->line("dashboard");

        $this->check_auth('dashboard');
        $result['customers'] = $this->claims_model->get_num_customers($this->session->userdata('user_id'));
        $result['buildings'] = $this->claims_model->get_num_buildings($this->session->userdata('user_id'));
        $result['homes'] = $this->claims_model->get_num_homes($this->session->userdata('user_id'));
        $result['contracts'] = $this->claims_model->get_num_contracts($this->session->userdata('user_id'));
        $result['payments'] = $this->claims_model->get_sum_payments($this->session->userdata('user_id'));
        $result['totals'] = $this->claims_model->get_sum_total_payments($this->session->userdata('user_id'));
        $result['task'] = $this->claims_model->get_my_task($this->session->userdata('username'));

        $result['unpaid'] = $this->claims_model->get_due_contract();
        $result['expire'] = $this->claims_model->get_will_expire();
        $result['incoming'] = $this->claims_model->get_incoming_payment();

        $this->load->view('templates/header', $title);
        $this->load->view('dashboard', $result);
        $this->load->view('templates/footer');
    }

    public function staff()
    {
        $this->check_auth('staff');

        $title['title'] = $this->lang->line('vendor_list');
        $result['stafflist'] = $this->claims_model->get_staff();

        $this->load->view('templates/header', $title);
        $this->load->view('staff', $result);
        $this->load->view('templates/footer');
    }

    public function user_profile($id = 0)
    {
        $this->check_auth('user_profile');

        $title['title'] = $this->lang->line("mobsy_my_profile");
        $result['vendor'] = $this->claims_model->get_user_profile($id);
        $result['task'] = $this->claims_model->get_my_task($this->session->userdata('username'));
        $result['membership'] = $this->claims_model->get_my_membership($this->session->userdata('user_id'));
        $result['buildingsCount'] = $this->claims_model->get_buildings_count($this->session->userdata('user_id'));
        $result['homesCount'] = $this->claims_model->get_homes_count($this->session->userdata('user_id'));
        $result['contractsCount'] = $this->claims_model->get_contracts_count($this->session->userdata('user_id'));
        //var_dump($result['membership']); exit;
        $this->load->view('templates/header', $title);
        $this->load->view('staff_profile', $result);
        $this->load->view('templates/footer');
    }

    public function add_staff()
    {
        $validator = array('success' => false, 'messages' => array());

        $data = $this->input->post();

        $check_user = $this->claims_model->check_staff($data['username']);

        if (is_null($check_user)) {
            if ($data['name']) {
                $insert_data = $this->claims_model->insert_new_staff($data);

                if ($insert_data) {
                    $validator['success'] = true;
                    $validator['messages'] = $this->lang->line('staff_successfully_added');
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line('staff_did_not_save');
                }
            } else {
                $insert_data = $this->claims_model->insert_staff($data);

                if ($insert_data) {
                    $validator['success'] = true;
                    $validator['messages'] = $this->lang->line('staff_successfully_added');
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line('staff_did_not_save');
                }
            }
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line('username_already_exist');
        }

        echo json_encode($validator);
    }

    public function add_vendor()
    {
        $validator = array('success' => false, 'messages' => array());

        $data = $this->input->post();

        $check_user = $this->claims_model->check_staff($data['username']);

        if (is_null($check_user)) {
            if ($data['fullname']) {
                $insert_data = $this->claims_model->insert_new_staff($data);

                if ($insert_data) {
                    $validator['success'] = true;
                    $validator['messages'] = $this->lang->line('staff_successfully_added');
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line('staff_did_not_save');
                }
            } else {
                $insert_data = $this->claims_model->insert_staff($data);

                if ($insert_data) {
                    $validator['success'] = true;
                    $validator['messages'] = $this->lang->line('staff_successfully_added');
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line('staff_did_not_save');
                }
            }
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line('username_already_exist');
        }

        echo json_encode($validator);
    }

    public function save_vendor()
    {
        $validator = array('success' => false, 'messages' => array());
        $data = $this->input->post();
        $check_user = $this->claims_model->check_staff($data['username']);

        if (!is_null($check_user)) {
            $update_data = $this->claims_model->update_staff($data);
            if ($update_data) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('staff_successfully_update');
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line('staff_did_not_save');
            }
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line('username_does_not_exist');
        }
        echo json_encode($validator);
    }

    public function create_staff()
    {
        $validator = array('success' => false, 'messages' => array());

        $data = $this->input->post();

        $create_staff = $this->claims_model->create_staff($data);

        if ($create_staff) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line('profile_completed');
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line('profile_did_not_save');
        }

        echo json_encode($validator);
    }

    public function user_profile_update($id)
    {
        $this->check_auth('user_profile');

        $title['title'] = $this->lang->line('vendor_profile_update');
        $result['vendor'] = $this->claims_model->get_user_profile($id);

        $this->load->view('templates/header', $title);
        $this->load->view('staff_profile_update', $result);
        $this->load->view('templates/footer');
    }

    public function update_user_profile()
    {
        $validator = array('success' => false, 'messages' => array());

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) {
            $client_data = array(
                'username' => $this->session->userdata('username'),
                'img' => '',
                'email' => $this->input->post('email'),
                'num' => $this->input->post('num'),
                'bio' => $this->input->post('bio'),
                'mname' => $this->input->post('mname'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'address' => $this->input->post('address'),
            );

            $update_profile = $this->claims_model->update_my_profile($client_data);

            if ($update_profile) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line('update_successfully');
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line('something_went_wrong_please');
            }
        } else {
            $data = $this->upload->data();
            //Resize and Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/'.$data['file_name'];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['quality'] = '60%';
            $config['width'] = 600;
            $config['height'] = 400;
            $config['new_image'] = './uploads/'.$data['file_name'];

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $client_data = array(
                'username' => $this->session->userdata('username'),
                'img' => $data['file_name'],
                'email' => $this->input->post('email'),
                'num' => $this->input->post('num'),
                'bio' => $this->input->post('bio'),
                'mname' => $this->input->post('mname'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'address' => $this->input->post('address'),
            );

            $update_profile = $this->claims_model->update_my_profile($client_data);

            if ($update_profile) {
                $validator['success'] = true;
                $validator['messages'] = $this->lang->line("update_successfully");
            }
        }

        echo json_encode($validator);
    }

    public function back_up()
    {
        $title['title'] = $this->lang->line('mobsy_backup');

        $this->load->view('templates/header', $title);
        $this->load->view('backup/back_up');
        $this->load->view('templates/footer');
    }

    public function local_backup()
    {
        $this->load->dbutil();

        $backup = $this->dbutil->backup();

        $this->load->helper('file');

        $name = 'backup_'.date('m-d-Y_hi').'.gz';

        write_file('/path/to/'.$name, $backup);

        $this->load->helper('download');

        force_download($name, $backup);
    }

    public function create_task()
    {
        $validator = array('success' => false, 'messages' => array());

        $data = $this->input->post();

        $task = $this->claims_model->create_task($data);

        if ($task) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line('task_created');
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("failed_to_create_task");
        }

        echo json_encode($validator);
    }

    public function end_task()
    {
        $validator = array('success' => false, 'messages' => array());

        $data = $this->input->post();

        $task = $this->claims_model->end_task($data);

        if ($task) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line('task_done');
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("failed_to_finish_task");
        }

        echo json_encode($validator);
    }

    public function remove_task()
    {
        $validator = array('success' => false, 'messages' => array());

        $data = $this->input->post();

        $task = $this->claims_model->remove_task($data);

        if ($task) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line('task_remove');
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line('failed_to_remove_task');
        }

        echo json_encode($validator);
    }

    public function update_task()
    {
        $validator = array('success' => false, 'messages' => array());

        $data = $this->input->post();

        $task = $this->claims_model->update_task($data);

        if ($task) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line('task_update');
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line('failed_to_update_task');
        }

        echo json_encode($validator);
    }

    public function change_password()
    {
        $validator = array('success' => false, 'messages' => array());

        $data = $this->input->post();

        $result = $this->claims_model->change_pass($data);

        if ($result) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line('password_successfully_changed');
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line('password_not_changed');
        }

        echo json_encode($validator);
    }

    public function remove_staff()
    {
        $result = $this->claims_model->remove_staff($this->input->post('id'));
        if ($result) {
            echo $this->lang->line('successfully_removed_staff');
        } else {
            echo $this->lang->line('false');
        }
    }

    public function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
