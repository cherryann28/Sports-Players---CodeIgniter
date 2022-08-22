<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Player');
	}

	/*
		* DOCU: This function is to display all players information
		* Owned by Cherry Ann Nepomuceno 
	*/
	public function index()
	{
		$data['all_players'] = $this->Player->get_all_players();
		$this->load->view('players', $data);
	}
	
	/*
		* DOCU: This function is to process the post data from the players page
		* Owned by Cherry Ann Nepomuceno 
	*/
	public function process()
	{
		$data["all_players"] = $this->Player->search_player();
		$this->load->view('players', $data);
	}
}
