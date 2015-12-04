<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Steelers Website for educational purposes.
 * Authors: Pair Programming Rosanna and Nadia adding the Welcome homepage
 */
class History extends Application {

	function __construct() {
		parent::__construct();
	}

	// public function index() {
 //        $this->data['pagebody'] = 'league';
 //        $this->render();
	// }

    // 2015-12-02
    // Fetch XML data and update standings table in db
    function updateStandings() {
        $this->load->model('scores');
        $allCodes = $this->teams->getGroups('Code');

        // get team
        foreach ($allCodes as $teamCode) {
            $query = $this->scores->some('Code', $teamCode->Code, 'Date');
            $team = $this->teams->getFromCode($teamCode->Code);
            $team->W = 0;
            $team->L = 0;
            $team->PF = 0;
            $team->PA = 0;

            // calculate history for one team;
            foreach($query as $row) {
                if ($row->ScoreHome > $row->ScoreOpponent) {
                    $team->W += 1;
                } else {
                    $team->L += 1;
                }

                $team->PF += $row->ScoreHome;
                $team->PA += $row->ScoreOpponent;

                $team->Pct1 = $team->PF / ($team->PF + $team->PA);
            }

            $this->getLast5($team->Code);

            $this->teams->update($team);
        }

    } // end updateStandings

    public function getLast5($code){
        $last_5 = array();
        $last_5 = $this->scores->someDescending('Code', $code, 'Date', 5);
        $num = count($last_5);

        $total = 0;
        foreach ($last_5 as $value) {
           $total += $value->ScoreHome;
        }

        return $total/$num;

       
   }

    // Return filtered records as an array of records
    function someDescending($key, $value, $order, $limit) {
       
       $this->db->order_by($order, 'desc');
       //$this->db->order_by($this->_keyField, 'asc');
       $this->db->where($key, $value);
       $query = $this->db->get($this->_tableName, $limit);
       return $query->result();
    }
   
    function getAvgLast5($ourCode, $opponentCode){
        $last_5 = array();
        $last_5 = $this->someDescending('Code', $ourCode, 'Date', 5);
        $num = count($last_5);

        $total = 0;
        foreach ($last_5 as $value) {
           $homeScore = $value->ScoreHome;
           $againstScore = $value->ScoreOpponent;
           $total += $homeScore;      
        }
        $avgLast_5 = $total/$num;

        var_dump($last_5);
       
       
   }

	
}
