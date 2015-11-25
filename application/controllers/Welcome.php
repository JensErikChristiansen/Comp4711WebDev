<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Steelers Website for educational purposes.
 * Authors: Pair Programming Rosanna and Nadia adding the Welcome homepage
 */
class Welcome extends Application {

	function __construct() {
		parent::__construct();
		$this->session->set_userdata('editPage', '/welcome');
		//$this->load->view('welcome');
        $this->data['pagebody'] = 'welcome';
        $this->data['Codes'] = $this->populateDropdown();
        $this->data['Submit'] = makeSubmitButton('Predict', "Predict",
        'btn btn-default');
        $this->data['YourResults'] = "";
        $this->data['OpponentResults'] = "";
        $this->data['ResultsHeading'] = "";
	}

	public function index()
	{
        $this->render();
	}

	function populateDropdown() {
		
        //$this->db->select('Code');
        $query = $this->db->order_by('Code', 'asc');
        $query = $this->db->get('standings');

        $codes = $query->result();
        // remove our team from the dropdown
        unset($codes[24]);
        $codes = array_values($codes);

        return $codes;

        // $this->data['Dropdown'] = makeComboField(
        //     'Code', // label
        //     "Code", //name
        //     0, //value
        //     $codes, //options
        //     "", // explain
        //     40, //maxlen
        //     15, //size
        //     false //disabled
        // );
	}

	function predict() {
		$code = $_POST['codeSelect'];
		$steelers = $this->teams->getFromCode('PIT');
		$opponent = $this->teams->getFromCode($code);

		$overallAvg = $opponent->Pct1;
		$last5String = $opponent->Last_5;

		$fiveGameAvg = ((int)$last5String
					+ (int)substr(strstr($last5String, "-", false), 1))
					/ 2;

		//70% * (overall average) 
		// + 20% * (last 5 games average) 
		// + 10% * (average of last 5 games against this opponent)

		$this->data['ResultsHeading'] = heading("Results", 2, 'class="text-center bg-danger"');
		$this->data['YourResults'] = $this->parser->parse('_predictionResults', $steelers, true);
		$this->data['OpponentResults'] = $this->parser->parse('_predictionResults', $opponent, true);
		$this->render();
	}
}
