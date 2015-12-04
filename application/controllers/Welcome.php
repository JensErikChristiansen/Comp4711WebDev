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
        $this->data['Submit'] = makeSubmitButtonID('Predict', "Predict", "Predict2",
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

    
	/*function predict() {

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
	}*/

    function getPredict() {
        // invoke the parser without third parameter, so results returned to browser
        $this->parser->parse('show_results',array('message'=>"MESSAGE"));
        
    }
    
    
    function predict() {
        /* Jens is going to work on overall avg and last 5 games avg */
        
        
        //---- get PIT overall average and get PIT last 5 games average
        //Our Team
        $ourCode = "PIT";
        $steelersStandings = $this->teams->getFromCode($ourCode);
        $overallAvg = $steelersStandings->Pct1;
        //$lastFive = $steelersStandings->Last_5; use this one when standigns are fixed;
        //----end get PIT overall average and last 5 games
        
        $this->load->model('scores');
        //change this later to get from standings
        $lastFive = $this->scores->getAvgLast5($ourCode);

        // Gather opponent code from dropdown
        $opponentCode = $_POST['codeSelect'];
        
        ///--------Predict our points
        $avgAgainstOpponent = $this->scores->getAvgLast5Opponent($ourCode, $opponentCode);
        if($avgAgainstOpponent == 0){
            $pointsUs = ((0.70 * $overallAvg) + (0.20 * $lastFive))/0.9;
        }
        else{
            $pointsUs = (0.70 * $overallAvg) + (0.20 * $lastFive) + (0.10 * $avgAgainstOpponent);
        }
        echo "Predict that Steelers will get:";
        echo $pointsUs;
        ///---------end Predict Our Points
        
        /////------------Predict Opponent points
        $opponentStandings = $this->teams->getFromCode($opponentCode);
        $overallOpponentAvg = $opponentStandings->Pct1;
        $lastFiveOpponent = $this->scores->getAvgLast5($opponentCode); //different when standings updated
        $avgAgainstUs = $this->scores->getAvgLast5Opponent($opponentCode, $ourCode);
        if($avgAgainstUs == 0){
            $pointsOpponent = ((0.70 * $overallOpponentAvg) + (0.20 * $lastFiveOpponent))/0.9;
        }
        else{
            $pointsOpponent = (0.70 * $overallOpponentAvg) + (0.20 * $lastFiveOpponent) + (0.10 * $avgAgainstUs);
        }
        echo "Predict that Opponents will get:";
        echo $pointsOpponent;
        //---------end Predict Opponent score
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
        //$this->teams->newStandings($allScores);
        $allCodes = $this->teams->getAllCodes();
        
        foreach ($allCodes as $codeValue) {
            $info = array();
            $info = $this->scores->getInfo($codeValue);
            if($info == 0 ){
                echo "no Games are played!!! get DATA";
            }
            else{
                //foreach($avgScore as $v){
                //     echo $v;
                 //}
           
                 $this->teams->updateInfo($info, $codeValue);
            }
        }
        //echo count($scores);
        //sort($scores);
        $this->data['Scores'] = $scores;
        // Present the list to choose from
        $this->data['pagebody'] = 'welcome';
        $this->render();
    }
        
        
        
}
