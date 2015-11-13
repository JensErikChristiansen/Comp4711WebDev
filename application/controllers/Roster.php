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
        $this->data['ta'] = '_table';
        $config['base_url'] = '/roster/page';
		$config['total_rows'] = $this->rosters->size();
		$config['per_page'] = 12;
		$this->pagination->initialize($config);


        //$this->data['roster'] = 
        $this->displayTable($this->rosters->range($config['per_page'], $pagenum));
        $this->render();
        echo $this->pagination->create_links();
    }

    function displayTable($arr) {
    	foreach($arr as $row) {
			$cells[] = $this->parser->parse('_tableRow', (array) $row, true);
		}

		$this->load->library('table');
		$parms = array(
			'table_open' => '<table class="table">',
			
		);
		$this->table->set_template($parms);

		$rows = $this->table->make_columns($cells, 1);
		$this->data['Row'] = $this->table->generate($rows);
		//$this->data['Row'] = $cells;
		$this->data['tableContent'] =$this->parser->parse('_table', $this->data, true);	
		$this->data['theview'] = $this->data['tableContent'];
    }

    function displayGallery($arr) {
    	//$pix = $this->images->all();

		foreach($arr as $row) {
			$cells[] = $this->parser->parse('_gallery', (array) $row, true);
		}

		$this->load->library('table');
		$parms = array(
			'table_open' => '<table class="gallery">',
			'cell_start' => '<td class="oneimage">',
			'cell_alt_start' => '<td class="oneimage">'
		);
		$this->table->set_template($parms);

		$rows = $this->table->make_columns($cells, 3);
		$this->data['theview'] = $this->table->generate($rows);
		//$this->data['theview'] = $cells;
    }

}
