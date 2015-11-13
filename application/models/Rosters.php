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
class Rosters extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('roster', 'ID');
    }
    
    function get_by_range(){
        $query = $this->db->get('roster', $pagingConfig['per_page'], (($page-1) * $pagingConfig['per_page']));
        return $query->result();
    }

}
