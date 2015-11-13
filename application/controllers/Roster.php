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
        $this->data['roster'] = $this->rosters->all();
        $this->load->library('pagination');
        $this->data['pagebody'] = 'roster';
        $config['base_url'] = '/rosters/page';
		$config['total_rows'] = $this->rosters->size();
		$config['per_page'] = 12;

		$this->pagination->initialize($config);

		echo $this->pagination->create_links();
        $this->render();
    }

    function page($pagenum) {
		echo $this->pagination->create_links();
    }

}
