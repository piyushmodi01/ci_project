<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller{
  
 
	 public function index()
    {
						$this->load->view('add_customer.html');
            
    }

public function add_customer()
{
			$config = array(
   'upload_path' => "./assets/upload/",
   'allowed_types' => "gif|jpg|png|jpeg",
   'overwrite' => TRUE,
   );
   




   	$this->load->library('upload',$config);
   	$logo=$this->upload->do_upload('logo');
    $uploadData = $this->upload->data('file_name');
    $picture="assets/upload/".$uploadData;
    $logo = array('logo' => $picture);
   
				$customer_data = $this->input->post();
				unset($customer_data['btn_submit']);

        $customer_data['logo']=$logo['logo'];



        $lastRecordArray=$this->Dbmodel->getLastCustomer();
        
       
        $customer_data['c_id']=$lastRecordArray[0]['c_id']+1;


       $this->Dbmodel->addCustomer($customer_data);
        redirect("Customer",referesh);

        
					
		}


	}