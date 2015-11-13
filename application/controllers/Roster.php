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

    }

    function page($pagenum) {     
        $this->load->library('pagination');
        $this->data['pagebody'] = 'roster';
        $config['base_url'] = '/roster/page';
		$config['total_rows'] = $this->rosters->size();
		$config['per_page'] = 12;
		$this->pagination->initialize($config);


        $this->data['roster'] = $this->rosters->range($config['per_page'], $pagenum);        
        $this->render();
        		echo $this->pagination->create_links();
    }

}
