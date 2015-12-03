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

    function getPrediction() {
        /* Jens is going to work on overall avg and last 5 games avg */
        // get PIT overall average
        // get PIT last 5 games average
        /************************************/

        // get 

        // calculate 70% * PIT overall avg
        // calculate 20% * PIT last 5 games avg
        
        // get last 5 games where Code == PIT and Opponent == the other guys
        // calculate number of PIT wins and divide by number of games played against opponent

        // calculate 10% * last 5 avg against opponent

        // add them all up
    }
        
    function updateScores() {
        $this->load->model('scores');
        $this->scores->delete_all(); //delete all previous data
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
            
            //getting the next ID
             $scores_num = $this->scores->highest() +1;
             $newscore = $this->scores->create();
             
             $newscore->ID = $scores_num;
             $newscore->Code = $value['home'];
             $newscore->Date = $value['date'];
             $newscore->ScoreHome = $nums[0];
             $newscore->OpponentCode = $value['away'];
             $newscore->ScoreOpponent = $nums[1];
            // var_dump($newscore);
             
             $this->scores->add($newscore);
             
             $newscore1 = $this->scores->create();
             
             $newscore1->ID = $scores_num + 1;
             $newscore1->Code = $value['away'];
             $newscore1->Date = $value['date'];
             $newscore1->ScoreHome = $nums[1];
             $newscore1->OpponentCode = $value['home'];
             $newscore1->ScoreOpponent = $nums[0];
            // var_dump($newscore);
             
             $this->scores->add($newscore1);
                             
        }
        
        
        
        //echo count($scores);
        //sort($scores);
        $this->data['Scores'] = $scores;
        // Present the list to choose from
        $this->data['pagebody'] = 'welcome';
        $this->render();
    }
        
        
        
}
