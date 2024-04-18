<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller
 {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_certificate');
        $this->load->model('M_events');
    }

	
	public function index()
	{
		$data['certificates'] = $this->db->get_where('certificates', ['certificate_id' => $this->session->userdata('certificate_id')])->row_array();
		$data['title'] = 'E - Sertifikat';
        $Certificate = $this->M_certificate->getDataCertificate();
		$data['Certificate'] = $Certificate;
        $queryAllcertificate = $this->M_certificate->getDataCertificate();
		$data['queryAllcertificate'] = $queryAllcertificate;
		// $this->load->view('layout/header', $data);
        // $this->load->view('layout/navbar');
        // $this->load->view('layout/sidebar');
		$this->load->view('certificate/vw_certificate', $data);
        // $this->load->view('layout/footer');
		
	}

	public function tambah_certificate()
	{
		$data['certificates'] = $this->db->get_where('certificates', ['certificate_id' => $this->session->userdata('certificate_id')])->row_array();
		$data['title'] = 'E - Sertifikat';
        // $certificate = $this->M_certificate->getDataCertificate();
		$events = $this->M_events->getDataEvents();
		$desha = $this->db->query("SELECT * FROM users WHERE level='user'")->result();
        // $data['certificate'] = $certificate;
		$data['events'] = $events;
        $data['desha'] = $desha;
		// $this->load->view('layout/header', $data);
        // $this->load->view('layout/navbar');
        // $this->load->view('layout/sidebar');
		$this->load->view('certificate/vw_tbcertificate', $data);
		// $this->load->view('layout/footer');
	}

    public function edit_certificate($certificate_id)
	{
		$data['certificates'] = $this->db->get_where('certificates', ['certificate_id' => $this->session->userdata('certificate_id')])->row_array();
		$data['title'] = 'E - Sertifikat';
        $queryAllcertificate = $this->M_certificate->getDatacertificateDetail($certificate_id);
		$data['queryAllcertificate'] = $queryAllcertificate;
		// $this->load->view('layout/header', $data);
        // $this->load->view('layout/navbar');
        // $this->load->view('layout/sidebar');
		$this->load->view('certificate/vw_editcertificate', $data);
		// $this->load->view('layout/footer');
	}

	public function fungsi_tambah_certificate()
   {
        $data['certificates'] = $this->db->get_where('certificates', ['certificate_id' => $this->session->userdata('certificate_id')])->row_array();

        // $certificate_id = $this->input->post('certificate_id');
        $participant_name = $this->input->post('participant_name');
        $event_name = $this->input->post('event_name');
        $event_date = $this->input->post('event_date');
        $certificate_text = $this->input->post('certificate_text');
  
       

        $ArrInsert = array(
            // 'certificate_id' => $certificate_id,
            'participant_name' =>  $participant_name,
            'event_name' => $event_name,
            'event_date' => $event_date,
            'certificate_text' => $certificate_text
 
           
        );

        $this->M_certificate->insertDataCertificate($ArrInsert);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
        redirect('certificate');
    }

    public function fungsi_edit_certificate()
    {
        $data['certificates'] = $this->db->get_where('certificates', ['certificate_id' => $this->session->userdata('certificate_id')])->row_array();

        $certificate_id = $this->input->post('certificate_id');
        $participant_name = $this->input->post('participant_name');
        $event_name = $this->input->post('event_name');
        $event_date = $this->input->post('event_date');
        $certificate_text = $this->input->post('certificate_text');
      

        $ArrUpdate = array(
            'certificate_id' => $certificate_id,
            'participant_name' =>  $participant_name,
            'event_name' => $event_name,
            'event_date' => $event_date,
            'certificate_text' => $certificate_text
         
           
        );

        $this->M_certificate->updateDataCertificate($certificate_id, $ArrUpdate);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
        redirect('certificate');
    }

    public function hapus_certificate($certificate_id)
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

        $this->M_certificate->hapusCertificate($certificate_id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('certificate');
    }

}