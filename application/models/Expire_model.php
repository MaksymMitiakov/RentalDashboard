<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Expire_model extends CI_Model
{
    public function get_memberships_id()
    {
        $today = date('Y-m-d');

        return $this->db->select('memberships.id as id, users.email as email')
        ->from('memberships')->join('users', 'users.id=memberships.vendor_id')->where('memberships.expired_date <', $today)->where('memberships.status', 'active')
        ->get()->result();
    }

    public function set_memberships_expired($membership_id)
    {
        return $this->db->where('id', $membership_id)->update('memberships', array('status' => 'expired'));
    }
}
