<?php

	class MY_Controller extends CI_Controller{

		public function __construct(){
		parent::__construct(); 

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('array');
		$this->load->model('Dbmodel');
	}

	}

?>