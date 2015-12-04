<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Roster
 *
 * @author Nina
 */
class Scores extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('scores', 'ID');
    }
    
    public function delete_all(){
        $this->db->empty_table('scores'); 
    }
    
    public function EnteredScores(){
        $allScores = array();
        $allScores = $this->all();
        return $allScores;
    }
    
    public function getAvgLast5Opponent($ourCode, $opponentCode){
        $last_5 = array();
        $last_5 = $this->someDescendingOpponent('Code', $ourCode, $opponentCode, 'Date', 5);
        $num = count($last_5);   
        if($last_5 == null){
            return 0;
        }
        else{
            $total = 0;
            foreach ($last_5 as $value) {
                 $homeScore = $value -> ScoreHome;
                 $againstScore = $value -> ScoreOpponent;
                 $total += $homeScore;      
            }
        $avgLast_5 = $total/$num;
            return $avgLast_5;
        //var_dump($last_5);
        }
    }

    function someDescendingOpponent($key, $value, $opponentCode, $order, $limit) {
        
        $this->db->order_by($order, 'desc');
        //$this->db->order_by($this->_keyField, 'asc');
        $this->db->where($key, $value);
        $this->db->where('OpponentCode',$opponentCode);
        $query = $this->db->get($this->_tableName, $limit);
        if ($query->num_rows() < 1)
            return null;
        else
            return $query->result();
    }
    
    

    
    
    // Retrieve a team based on its Code instead of ID.
    function getFromCode($code) {
        $this->db->where('Code', $code);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return null;
        return $query->row();
    }
    ////////////////// -----------------Code for Last 5
    // Return filtered records as an array of records
    function someDescending($key, $value, $order, $limit) {
        
        $this->db->order_by($order, 'desc');
        //$this->db->order_by($this->_keyField, 'asc');
        $this->db->where($key, $value);
        $query = $this->db->get($this->_tableName, $limit);
        return $query->result();
    }
    
        public function getAvgLast5($ourCode){
        $last_5 = array();
        $last_5 = $this->someDescending('Code', $ourCode, 'Date', 5);
        $num = count($last_5);
        
        $total = 0;
        foreach ($last_5 as $value) {
            $homeScore = $value -> ScoreHome;
            $againstScore = $value -> ScoreOpponent;
            $total += $homeScore;      
        }
        $avgLast_5 = $total/$num;
        
        return $avgLast_5;
    }
    
    public function getInfo($Code){
        $dataTeam = array();
        $dataTeam = $this->some('Code', $Code, 'ID');
        $num = count($dataTeam);
        if($num == 0){
            return 0;
        }
        else {
        $totalHome = 0;
        $totalAgainst = 0;
        $wins = 0;
        $losses = 0;
        $ties = 0;
        foreach ($dataTeam as $value) {
            $homeScore = $value -> ScoreHome;
            $awayScore = $value -> ScoreOpponent;
            $totalHome += $homeScore;      
            $totalAgainst += $awayScore;
            if($homeScore > $awayScore){
               $wins++; 
            }
            else if($homeScore < $awayScore){
                $losses++;
            }
            else
                $ties++;
        }
        $avgScore = $totalHome/$num;

        $scoreInfo = array($wins, $losses, $ties, $totalHome, $totalAgainst, $avgScore);
        return $scoreInfo;
        }
    }

}
