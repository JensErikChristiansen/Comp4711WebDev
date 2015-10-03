<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Roster
 *
 * @author Rosanna Wubs and Nadia Dobrianskaia (pair programming)
 */
class Roster extends Application {
    public function index()
    {

        $this->load->model('rosters');
        $this->data['rost'] = $this->rosters->all();  
        
        
            //$this->load->view('welcome');
        $this->data['pagebody'] = 'roster';
        $this->render();
    }
}
