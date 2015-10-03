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
class Rosters extends CI_Model{
    
    var $data = array(
        array('id' => '01', 'team' =>'PIT','num' => '22','name' => 'Ronald Jeff', 'position'=>'Forward','photo' => '/assets/data/img/nfl-logo.jpg', 'where'=>'/',
            'age' => '', 'height' => ''),
        array('id' => '02', 'team' =>'PIT', 'num' => '11','name' => 'Jeff Ronald', 'position'=>'Kick','photo' => '/assets/data/img/nfl-logo.jpg', 'where'=>'/',
            'age' => '', 'height' => ''),
        array('id' => '03', 'team' =>'PIT', 'num' => '2','name' => 'Bull Rex', 'position'=>'Defence','photo' => '/assets/data/img/nfl-logo.jpg', 'where'=>'/',
            'age' => '', 'height' => ''),
        array('id' => '04', 'team' =>'PIT', 'num' => '78','name' => 'George Simpilton', 'position'=>'25c back','photo' => '/assets/data/img/nfl-logo.jpg', 'where'=>'/',
            'age' => '', 'height' => ''),
        array('id' => '05', 'team' =>'PIT', 'num' => '99','name' => 'Rosanna Woooops', 'position'=>'Goalie','photo' => '/assets/data/img/nfl-logo.jpg', 'where'=>'/',
            'age' => '', 'height' => ''),
        
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    /*
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }
    */

    // retrieve all of the quotes
    public function all() {
        return $this->data;
    }

    //put your code here
}
