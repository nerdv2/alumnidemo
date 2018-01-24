<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('FormulirModel');
    $this->load->model('DataMasterModel');
    $this->load->model('PhotoModel');
  }

	public function index()
	{
    $data['kelas'] = $this->DataMasterModel->getDataKelas();
    $data['header'] = $this->DataMasterModel->getDataHeader();
    $data['gallery'] = $this->DataMasterModel->getDataGallery();
    $data['formulir'] = $this->DataMasterModel->getDataFormulir();
		$this->load->view('homepage/home', $data);
  }
    
  public function inputformulir()
  {
    $data['kelas'] = $this->DataMasterModel->getDataKelas();
    $data['header'] = $this->DataMasterModel->getDataHeader();
    $data['gallery'] = $this->DataMasterModel->getDataGallery();
    $data['formulir'] = $this->DataMasterModel->getDataFormulir();

    $this->form_validation->set_rules('name', 'Nama', 'trim|required');
    $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'trim|required');
    $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email');
    $this->form_validation->set_rules('no_hp', 'No. Telp', 'trim|required|numeric');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
    $this->form_validation->set_rules('kelas_terakhir', 'Kelas Terakhir', 'trim|required|numeric');
    if (empty($_FILES['photo_file']['name'])) {
      $this->form_validation->set_rules('photo_file', 'Foto', 'required');
    }
    $this->form_validation->set_rules('last_job', 'Pekerjaan Terakhir', 'trim');
    $this->form_validation->set_rules('keahlian', 'Bidang Keahlian', 'trim');
    $this->form_validation->set_rules('tempat_pilihan', 'Pilihan Tempat Acara', 'trim');
    $this->form_validation->set_rules('waktu_pilihan', 'Pilihan Waktu Acara', 'trim');
    $this->form_validation->set_rules('pesan', 'Pesan Acara', 'trim');
    $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
    $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
    $this->form_validation->set_rules('pesan', 'Pesan Acara', 'trim');

    if ($this->form_validation->run() === false) {
      $this->load->view('homepage/home', $data);
    } else {
      if ($this->FormulirModel->addFormulir()) {
        header("Location: ".base_url('#inputsuccess'));
        die();
      } else {
        header("Location: ".base_url('#inputfailed'));
        die();
      }
    }
  }

  public function uploadfoto()
  {
    $data['kelas'] = $this->DataMasterModel->getDataKelas();
    $data['header'] = $this->DataMasterModel->getDataHeader();
    $data['gallery'] = $this->DataMasterModel->getDataGallery();
    $data['formulir'] = $this->DataMasterModel->getDataFormulir();
    
    if (empty($_FILES['photo_file']['name'])) {
      $this->load->view('homepage/home', $data);
    } else {
      if ($this->PhotoModel->uploadImage()) {
        header("Location: ".base_url('#uploadsuccess'));
        die();
      } else {
        header("Location: ".base_url('#uploadfailed'));
        die();
      }
    }
  }
}
