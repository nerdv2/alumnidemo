<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('FormulirModel');
    $this->load->model('DataMasterModel');
    $this->load->model('PhotoModel');
    $this->load->model('AuthModel');
    $this->load->model('HeaderModel');
  }

  public function index()
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $this->load->view('admin/admin_view');
    } else {
      $this->login();
    }
  }

  public function header()
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      // set validation rules
      $this->form_validation->set_rules('title', 'Title', 'trim|required');
      $this->form_validation->set_rules('text', 'Text', 'trim|required');
      
      if ($this->form_validation->run() === false) {
          $data['query'] = $this->HeaderModel->Read_specific(1)->row();
          $this->load->view('header/header_view', $data);
      } else {
          if ($this->HeaderModel->editData(1)) {
              $this->HeaderModel->Redirect();
          } else {
              $data['query'] = $this->HeaderModel->Read_specific(1)->row();
              $this->load->view('header/header_view', $data);
          }
      }
    } else {
      $this->login();
    }
  }

  public function gallery()
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $data['query'] = $this->DataMasterModel->getDataGallery();
      $this->load->view('gallery/gallery_view', $data);
    } else {
      $this->login();
    }
  }

  public function gallery_approve($id)
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $this->PhotoModel->approvePhoto($id);
    } else {
      $this->login();
    }
  }

  public function gallery_disapprove($id)
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $this->PhotoModel->disapprovePhoto($id);
    } else {
      $this->login();
    }
  }

  public function gallery_delete($id)
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $this->PhotoModel->deleteData($id);
      $this->gallery();
    } else {
      $this->login();
    }
  }

  public function formulir()
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $data['query'] = $this->DataMasterModel->getDataFormulir();
      $this->load->view('formulir/formulir_view', $data);
    } else {
      $this->login();
    }
  }

  public function formulir_approve($id)
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $this->FormulirModel->approveFormulir($id);
    } else {
      $this->login();
    }
  }

  public function formulir_disapprove($id)
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $this->FormulirModel->disapproveFormulir($id);
    } else {
      $this->login();
    }
  }

  public function formulir_delete($id)
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      $this->FormulirModel->deleteData($id);
      $this->formulir();
    } else {
      $this->login();
    }
  }

  public function login()
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      redirect('/');
    } else {
      //set validation rules
      $this->form_validation->set_rules('usr', 'Username', 'required|alpha_numeric');
      $this->form_validation->set_rules('pwd', 'Password', 'required');
      
      if ($this->form_validation->run() === false) {
          //validation not ok, send validation error to view
          $this->load->view('login/login_view');
      } else {
          //set variables from the form
          $username = $this->input->post('usr');
          $password = $this->input->post('pwd');

          if ($this->AuthModel->resolve_user_login($username, $password)) {
              $user        = $this->AuthModel->get_user(1);

              //set session user data
              $_SESSION['username']   = (string)$user->username;
              $_SESSION['logged_in']  = (bool)true;

              $this->index();
          } else {
              $data['error'] = "Invalid username or password!";
              $this->load->view('login/login_view', $data);
          }
      }
    }
  }

  public function logout()
  {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
          
          // remove session datas
          foreach ($_SESSION as $key => $value) {
              unset($_SESSION[$key]);
          }
          
          // user logout ok
          redirect('/');
      } else {
          
          // there user was not logged in, we cannot logged him out,
          // redirect him to site root
          redirect('/');
      }
  }

}