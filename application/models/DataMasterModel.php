<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMasterModel extends CI_Model {
    
    public function getDataKelas()
    {
        $data = array();
        $query = $this->db->get('cms_kelas');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    public function getDataHeader()
    {
        $this->db->select('*');
        $this->db->from('cms_header');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function getDataGallery()
    {
        $this->db->select("*");
        $this->db->from('cms_photo');
        $query = $this->db->get();
        $qresult = $query->result();
        
        return $qresult;
    }

    public function getDataFormulir()
    {
        $this->db->select("*");
        $this->db->from('cms_formulir');
        $query = $this->db->get();
        $qresult = $query->result();
        if ($query->num_rows() == 0) {
            return $qresult;
        } else {
            foreach ($query->result_array() as $data) {
                $data['nmkelas'] = $this->getDataDB("name", "cms_kelas", "id", $data['lastclass']);

                switch($data['tempat_pilihan']) {
                    case 0:
                        $data['nmtempat'] = 'Kampus SMA 12';
                        break;
                    case 1:
                        $data['nmtempat'] = 'Auditorium Hotel';
                        break;
                    case 2:
                        $data['nmtempat'] = 'Resto / Cafe';
                        break;
                    case 3:
                        $data['nmtempat'] = 'Taman / Tempat Wisata';
                        break;
                }

                switch($data['waktu_pilihan']) {
                    case 0:
                        $data['nmwaktu'] = 'Februari 2019';
                        break;
                    case 1:
                        $data['nmwaktu'] = 'Mei 2019';
                        break;
                    case 2:
                        $data['nmwaktu'] = 'July 2019';
                        break;
                    case 3:
                        $data['nmwaktu'] = 'September 2019';
                        break;
                }
                
                $dataall[] = $data;
            }
            
            return $this->arraytoobject($dataall);
        }
        
        
        
        //return $qresult;
    }
    
    public function arraytoobject($array)
    {
        return json_decode(json_encode($array), false);
    }

    public function getDataDB($field, $table, $column, $key)
    {
        $this->db->select($field);
        $this->db->from($table);
        $this->db->where($column, $key);
        $query = $this->db->get();
        $data = $query->row();
        return $data->name;
    }

}