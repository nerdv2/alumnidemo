<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HeaderModel extends CI_Model
{
    

    public function Redirect()
    {
        redirect(base_url("index.php/admin/header"));
    }

    public function Read_specific($id)
    {
        $this->db->select('*');
        $this->db->from('cms_header');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function editData($id)
    {
        $data = array(
            'title'  => $this->input->post('title'),
            'text' => $this->input->post('text'),
            'created_at' => date('Y-m-j H:i:s'),
            'updated_at' => date('Y-m-j H:i:s')
        );

        $this->db->where("id", $id);
        $this->db->update("cms_header", $data);
        $this->Redirect();
    }
}
