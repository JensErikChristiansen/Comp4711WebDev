<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Scores
 *
 * @author Rosanna
 */
class Rosters extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('roster', 'ID');
    }

}
