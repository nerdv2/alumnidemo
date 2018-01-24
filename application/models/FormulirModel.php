<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormulirModel extends CI_Model {
    
    public function Redirect()
    {
        redirect(base_url("index.php/admin/formulir"));
    }

    public function addFormulir()
    {
        $result                         = false;
        $config['upload_path']          = './uploads/formulir';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('photo_file')) {
            $error = array('error' => $this->upload->display_errors());

            //var_dump($error);
            //die();

            $result = false;
        } else {
            $data = $this->upload->data();

            if ($this->addEntry($data)) {
                $result = true;
            }
            
        }

        return $result;
    }

    public function addEntry($filedata)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('nama_panggilan'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('no_hp'),
            'address' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'lastclass' => $this->input->post('kelas_terakhir'),
            'last_job' => $this->input->post('last_job'),
            'keahlian' => $this->input->post('keahlian'),
            'tempat_pilihan' => $this->input->post('tempat_pilihan'),
            'waktu_pilihan' => $this->input->post('waktu_pilihan'),
            'pesan' => $this->input->post('pesan'),
            'twitter' => $this->input->post('twitter'),
            'facebook' => $this->input->post('facebook'),
            'instagram' => $this->input->post('instagram'),
            'photo_file' => $filedata['file_name'],
            'approve' => 0,
            'created_at' => date('Y-m-j H:i:s'),
            'updated_at' => date('Y-m-j H:i:s')
        );

        return $this->db->insert('cms_formulir', $data);
    }

    public function approveFormulir($id)
    {
        $data = array(
            'approve'  => 1,
            'updated_at' => date('Y-m-j H:i:s')
        );

        $this->db->where("id", $id);
        $this->db->update("cms_formulir", $data);
        $this->Redirect();
    }

    public function disapproveFormulir($id)
    {
        $data = array(
            'approve'  => 0,
            'updated_at' => date('Y-m-j H:i:s')
        );

        $this->db->where("id", $id);
        $this->db->update("cms_formulir", $data);
        $this->Redirect();
    }

    public function deleteData($id)
    {
        if ($this->deleteImage($id)) {
            $data['id'] = $id;
            $this->db->where($data);
            $this->db->delete('cms_formulir');
        }
    }

    public function deleteImage($id)
    {
        $this->db->select('photo_file');
        $this->db->from('cms_formulir');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $data = $query->row();

        $imagename = $data->photo_file;

        $path = './uploads/formulir/' . $imagename;

        return unlink($path);

    }

}