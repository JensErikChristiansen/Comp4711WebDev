<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Steelers Website for educational purposes.
 * Authors: Pair Programming Rosanna and Nadia adding the Welcome homepage
 */
class History extends Application {

	function __construct() {
		parent::__construct();
		$this->session->set_userdata('editPage', '/history');
		//$this->load->view('welcome');
        $this->data['pagebody'] = 'history';
	}

	public function index() {
        $this->render();
	}

	function createTable($arr) {
        $this->table->set_heading(  "Logo",
                                    anchor("/league/orderBy/id", "Code"),
                                    anchor("/league/orderBy/name", "Name"),
                                    anchor("/league/orderBy/wins", "Wins"),
                                    anchor("/league/orderBy/losses", "Losses"),
                                    "League");

        foreach($arr as $row) {
            $this->table->add_row(  img(array('src'=>'/assets/data/img/' . $row->TeamLogo)),
                                    $row->Code,
                                    $row->TeamName,
                                    $row->W,
                                    $row->L,
                                    $row->League);
        }

        $parms = array(
            'table_open' => '<table class="table">'
        );

        $this->table->set_template($parms);

        //$this->data['thetable'] = $this->table->generate();
        return $this->table->generate();
    }
}
