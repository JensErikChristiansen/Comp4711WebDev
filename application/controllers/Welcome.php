<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Steelers Website for educational purposes.
 * Authors: Pair Programming Rosanna and Nadia adding the Welcome homepage and predictions
 * Jens implementing Ajax and presentation/styling
 */
class Welcome extends Application {

	function __construct() {
		parent::__construct();
		$this->session->set_userdata('editPage', '/welcome');
        $this->data['pagebody'] = 'welcome';
        $this->data['Codes'] = $this->populateDropdown();
        //$this->data['Submit'] = makeSubmitButtonID('Predict', "Predict", "Predict2",'btn btn-default');
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
	}

    function getPredict($item) {
        $this->predict($item);
        $array = array(
            0 => $this->parser->parse('_predictionResults', $this->data['OurTeamArray'], true),
            1 => $this->parser->parse('_predictionResults', $this->data['OpponentArray'], true),
        );
        echo json_encode($array);
    }
    
    
    function predict($opponentCode) {
        $this->data['ResultsHeading'] = heading("Results", 2, 'class="text-center bg-danger"');        
        
        //---- get PIT overall average and get PIT last 5 games average
        //Our Team
        $ourCode = "PIT";
        $steelersStandings = $this->teams->getFromCode($ourCode);
        $overallAvg = $steelersStandings->Pct1;
        //----end get PIT overall average and last 5 games
        
        $this->load->model('scores');
        $lastFive = $this->scores->getAvgLast5($ourCode);
        
        ///--------Predict our points
        $avgAgainstOpponent = $this->scores->getAvgLast5Opponent($ourCode, $opponentCode);
        if($avgAgainstOpponent == 0){
            $pointsUs = ((0.70 * $overallAvg) + (0.20 * $lastFive))/0.9;
        }
        else{
            $pointsUs = (0.70 * $overallAvg) + (0.20 * $lastFive) + (0.10 * $avgAgainstOpponent);
        }

        $ourTeam = array('TeamName' => $ourCode, 'AveragePts' => $pointsUs);

        $this->data['OurTeamArray'] = $ourTeam;
        ///---------end Prediction for Our Team
        
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

        $opponent = array('TeamName' => $opponentCode, 'AveragePts' => $pointsOpponent);
        $this->data['OpponentArray'] = $opponent;
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
            $row['score1'] = $nums[1];
            $row['score2'] = $nums[0];
            $scores[] = $row;
            
            //getting the next ID
             $scores_num = $this->scores->highest() +1;
             $newscore = $this->scores->create();
             
             $newscore->ID = $scores_num;
             $newscore->Code = $value['home'];
             $newscore->Date = $value['date'];
             $newscore->ScoreHome = $nums[1];
             $newscore->OpponentCode = $value['away'];
             $newscore->ScoreOpponent = $nums[0];
            // var_dump($newscore);
             
             $this->scores->add($newscore);
             
             $newscore1 = $this->scores->create();
             
             $newscore1->ID = $scores_num + 1;
             $newscore1->Code = $value['away'];
             $newscore1->Date = $value['date'];
             $newscore1->ScoreHome = $nums[0];
             $newscore1->OpponentCode = $value['home'];
             $newscore1->ScoreOpponent = $nums[1];
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
                 $this->teams->updateInfo($info, $codeValue);
            }
        }
        $this->data['Scores'] = $scores;
        // Present the list to choose from
        $this->data['pagebody'] = 'welcome';
        $this->render();
    }
        
        
        
}
