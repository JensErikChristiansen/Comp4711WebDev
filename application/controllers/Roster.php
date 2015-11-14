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
        $this->page(1);
    }

    function page($pagenum) {     
        //$this->load->library('pagination'); moved this to autoload
        
        //set the pagenum into a session variable
        $this->session->set_userdata('displayNumber', $pagenum);
        
        $this->data['pagebody'] = 'roster';
        $config['base_url'] = '/roster/page';
		$config['total_rows'] = $this->rosters->size();
		$config['per_page'] = 12;
		$this->pagination->initialize($config);
        
        //first see if the session was set if not set display table layout               
        if(isset($_SESSION['layout'])){
            $layout = $this->session->userdata('layout');
            if($layout)// session was galery layout
                $this->displayTable($this->rosters->range($config['per_page'], $pagenum));
            else
                $this->displayGallery($this->rosters->range($config['per_page'], $pagenum));
        }
        else
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
			'cell_start' => '<td>',
			'cell_alt_start' => '<td>'
		);
		$this->table->set_template($parms);
		$rows = $this->table->make_columns($cells, 1);
                $this->table->set_heading('Photo', 'Number', 'Name', 'Position','Status', 'Height');
		$this->data['theview'] = $this->table->generate($rows);
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

    function layout($layout){
        if($layout == 0){
             $this->session->set_userdata('layout', TRUE);
        }
        else{
            $this->session->set_userdata('layout', FALSE);
        }
        
        
        if(isset($_SESSION['displayNumber'])){ //if the displayNumber was set
            //take out the "page number" loaded from the session and input it in
            $displayNum = $this->session->userdata('displayNumber');
            $this->page($displayNum);
        }
        else
            $this->page(1); //if the displayNumber was never set
    }
}
