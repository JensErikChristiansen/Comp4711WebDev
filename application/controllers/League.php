<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of League
 *
 * @author Rosanna Wubs and Nadia Dobrianskaia (pair programming)
 */
class League extends Application {
    public function index()
    {
    	//$this->load->model('teams');
    	//$this->data['teams'] = $this->teams->all_ordered_by('W');
        //$this->load->view('welcome');
        $this->session->set_userdata('editPage', '/league');
        $this->data['pagebody'] = 'league';

        //first see if the session was set if not set display table layout               
        if(isset($_SESSION['orderby'])){
            $orderby = $this->session->userdata('orderby');
            $this->data['teams'] = $this->teams->all_ordered_by($orderby);
        }
        else
            $this->data['teams'] = $this->teams->all_ordered_by('Code');
        
        
        $parms = array(
        	'table_open' => '<table class="league">',
        	'cell_alt_start' => '<td class="oneteam">',
        	'cell_start' => '<td>',
        	'cell_end' => '</td>',
        	'row_start' => '<tr>',
        	'row_end' => '</tr>',

        	);

        $this->table->set_template($parms);
        //$this->data['thetable'] = $this->table;


        $this->render();
    }
    
    function orderby($orderby){
        if($orderby == "name"){
             $this->session->set_userdata('orderby', 'TeamName');
        }
        else if($orderby == "wins") {
            $this->session->set_userdata('orderby', 'W');
        }
        else if($orderby == "losses") {
            $this->session->set_userdata('orderby', 'L');
        }
        else {
            $this->session->set_userdata('orderby', 'Code');
        }
        $this->index();
    }
}
