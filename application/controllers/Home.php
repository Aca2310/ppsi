<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  function index()
  {
      $data['title'] = "Home - Lapor Yuk";
      $this->load->view('home', $data);
  }
}