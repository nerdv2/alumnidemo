<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhotoModel extends CI_Model {
    
    public function Redirect()
    {
        redirect(base_url("index.php/admin/gallery"));
    }

    public function addData($filedata)
    {
        $data = array(
            'file_name' => $filedata['file_name'],
            'approve' => 0,
            'created_at' => date('Y-m-j H:i:s'),
            'updated_at' => date('Y-m-j H:i:s')
        );

        return $this->db->insert('cms_photo', $data);
    }

    public function uploadImage()
    {
        $result                         = false;
        $config['upload_path']          = './uploads/gallery';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
        $files = $_FILES;
        $count = count($_FILES['photo_file']['name']);

        for($i = 0; $i < $count; $i++)
        {
            $_FILES['photo_file']['name']= $files['photo_file']['name'][$i];
            $_FILES['photo_file']['type']= $files['photo_file']['type'][$i];
            $_FILES['photo_file']['tmp_name']= $files['photo_file']['tmp_name'][$i];
            $_FILES['photo_file']['error']= $files['photo_file']['error'][$i];
            $_FILES['photo_file']['size']= $files['photo_file']['size'][$i];
            $this->upload->do_upload('photo_file');

            $data = $this->upload->data();

            if ($this->addData($data)) {
                $result = true;
            }

        }

        /*
        if (! $this->upload->do_upload('photo_file')) {
            $error = array('error' => $this->upload->display_errors());

            //var_dump($error);
            //die();

            $result = false;
        } else {
            $data = $this->upload->data();

            if ($this->addData($data)) {
                $result = true;
            }
            
        }
        */

        return $result;
    }

    public function approvePhoto($id)
    {
        $data = array(
            'approve'  => 1,
            'updated_at' => date('Y-m-j H:i:s')
        );

        $this->db->where("id", $id);
        $this->db->update("cms_photo", $data);
        $this->Redirect();
    }

    public function disapprovePhoto($id)
    {
        $data = array(
            'approve'  => 0,
            'updated_at' => date('Y-m-j H:i:s')
        );

        $this->db->where("id", $id);
        $this->db->update("cms_photo", $data);
        $this->Redirect();
    }

    public function deleteData($id)
    {
        if ($this->deleteImage($id)) {
            $data['id'] = $id;
            $this->db->where($data);
            $this->db->delete('cms_photo');
        }
    }

    public function deleteImage($id)
    {
        $this->db->select('file_name');
        $this->db->from('cms_photo');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $data = $query->row();

        $imagename = $data->file_name;

        $path = './uploads/gallery/' . $imagename;

        return unlink($path);

    }

}