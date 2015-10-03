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
    	$this->load->model('teams');
    	$this->data['teams'] = $this->teams->all();
        //$this->load->view('welcome');
        $this->data['pagebody'] = 'league';

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
}
