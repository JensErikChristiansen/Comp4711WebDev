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

}
