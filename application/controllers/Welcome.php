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

		$this->data['ResultsHeading'] = heading("Results", 2, 'class="text-center bg-danger"');

		// Gather Steelers data
		$steelers = $this->teams->getFromCode('PIT');
		$overallAvg = $steelers->Pct1;
		$fiveGameAvg = (float)$steelers->Last_5 / 5;
		$steelers->FiveGameAvg = $fiveGameAvg;
		$this->data['YourResults'] = $this->parser->parse('_predictionResults', $steelers, true);

		// Gather opponent data
		$code = $_POST['codeSelect'];
		$opponent = $this->teams->getFromCode($code);
		$overallAvg = $opponent->Pct1;
		//(float)substr(strstr($last5String, "-", false), 1)
		$fiveGameAvg = (float)$opponent->Last_5 / 5;
		$opponent->FiveGameAvg = $fiveGameAvg;
		$this->data['OpponentResults'] = $this->parser->parse('_predictionResults', $opponent, true);

		//70% * (overall average)
		// + 20% * (last 5 games average) 
		// + 10% * (average of last 5 games against this opponent)
		$this->render();
	}
        
        function updateScores() {
            $list = array();
            $url = "nfl.jlparry.com/rpc";
            $this->load->library('xmlrpc');
            $this->xmlrpc->server($url, 80);
            $this->xmlrpc->method('since');
            $request = array('20150830');
            $this->xmlrpc->request($request);
            if ( ! $this->xmlrpc->send_request())
            {
            echo "Error: " . $this->xmlrpc->display_error();
            }
            $list = $this->xmlrpc->display_response();
            
            // prepare the list for presentation
            $scores = array();

            foreach ($list as $key => $value)
            {
                $nums = array();
                $row = array('id' => $value['number'], 'date' => $value['date'], 'code' => $value['home'], 'opponentCode' => $value['away'], 'score1' => $value['score'], 'score2' => $value['score']);
                $nums = explode(':',$row['score1']);
                $row['score1'] = $nums[0];
                $row['score2'] = $nums[1];
                $scores[] = $row;

            }
            //echo count($scores);
            //sort($scores);
            $this->data['Scores'] = $scores;
            // Present the list to choose from
            $this->data['pagebody'] = 'welcome';
            $this->render();
        }
}
