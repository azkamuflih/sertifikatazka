<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class generate extends CI_Controller
{
        public function __construct()
    {
        parent::__construct();
        $this->load->model('M_certificate');
        $this->load->model('M_events');
        $this->load->model('M_generate');


        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">please login!</div>');
            redirect('auth/user');
        }
    }

    
    public function index()
	{
		$hessa['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$title['title'] = 'Generate admnin | Sertifikat Online';

		$generate = $this->M_generate->getDataGenerate();
		$data['generate'] = $generate;
        $queryAllgenerate = $this->M_generate->getDataGenerate();
		$data['queryAllgenerate'] = $queryAllgenerate;

		
		$this->load->view('generate/VW_generate', $data);
		
	}

	public function tambah_generate()
	{
		$data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Tambah Generate admnin | Sertifikat Online';
        $Certificate = $this->M_certificate->getDataCertificate();
		$events = $this->M_events->getDataevents();
		$desha = $this->db->query("SELECT * FROM users WHERE level='user'")->result();
		$data['Certificate'] = $Certificate;
		$data['events'] = $events;
		$data['desha'] = $desha;
		$this->load->view('generate/vw_tbgn', $data);
	}

	public function edit_generate($id)
	{
		$data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Edit Generate admnin | Sertifikat Online';

		$sertifikat = $this->model_sertifikat->getDatasertifikatDetail($id);
		$data['sertifikat'] = $sertifikat;

		$this->load->view('template/user/user_header', $data);
		$this->load->view('template/sidebar/admin', $data);
		$this->load->view('menu/generate/edit');
		$this->load->view('template/user/user_footer');
	}

	public function fungsi_tambah_generate()
    {
       $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

        $certificate_id = $this->input->post('certificate_id');
        $user_id = $this->input->post('user_id');
        $event_id = $this->input->post('event_id');
        $assigned_at = $this->input->post('assigned_at');

        $ArrInsert = array(
            'certificate_id' => $certificate_id,
            'user_id' => $user_id,
            'event_id' => $event_id,
            'assigned_at' => $assigned_at
        );

        $this->M_generate->insertDataGenerate($ArrInsert);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
		redirect('generate');
    }

 
	public function hapus_generate($id)
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

        $this->M_generate->hapusDataGenerate($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');

        redirect('generate');
    }

    public function download($id)
    {
        $sertifikat = $this->M_certificate->getDataCertificateDetail($id);
        $events = $this->M_events->getDataEventsDetail($id);
		
        $data['sertifikat'] = $sertifikat;
        $data['events'] = $events;

        $this->load->library('dompdf_gen');
        $this->load->view('generate/download', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('sertifikat.pdf', array('Attachment' => 0));
    }
}
