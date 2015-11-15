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
    // calls method page() with parameter 1 passed into it.. basically if no session was loaded just display a table view starting at record 1
    public function index()
    {
        $this->page(1);
    }
    
    function editMode() {
        if (!isset($_SESSION['editMode'])) {
            $this->session->set_userdata('editMode', true);
            $this->data['pagebody'] = 'edit';
        } else {
            if ($this->session->userdata('editMode')) {
                $this->session->set_userdata('editMode', false);
                $this->data['pagebody'] = 'welcome';
            } else {
                $this->session->set_userdata('editMode', true);
                $this->data['pagebody'] = 'edit';
            }
        }


        
        
        $this->render();
        //redirect($_SERVER['REQUEST_URI']);
//        if (!isset($_SESSION['displayNumber'])){
//            $player = $this->session->userdata('displayNumber');
//            $this->page($player);
//        } else {
//            $this->page(1);
//        }
        
    }

    function page($pagenum) {  
        $orderby;
        //$this->load->library('pagination'); moved this to autoload
        
        //set the pagenum into a session variable
        $this->session->set_userdata('displayNumber', $pagenum);

        if (!isset($_SESSION['editMode'])) {
            $this->data['pagebody'] = 'roster';
        } else {
            if ($this->session->userdata('editMode')) {
                $this->data['pagebody'] = 'roster_edit';
            } else {
                $this->data['pagebody'] = 'roster';
            }
        }

        
       // $this->data['pagebody'] = 'roster';
        $config['base_url'] = '/roster/page';
		$config['total_rows'] = $this->rosters->size();
		$config['per_page'] = 12;
		$this->pagination->initialize($config);
                        //first see if the session was set if not set the order of the display   
                
        if(isset($_SESSION['orderbyplayer'])){
            $orderby = $this->session->userdata('orderbyplayer');
            //$this->data['teams'] = $this->rosters->all_ordered_by($orderby);
        }
        else {
            $orderby = 'ID';
             //$this->data['teams'] = $this->rosters->all_ordered_by('Code');
        }

        //first see if the session was set if not set display table layout               
        if(isset($_SESSION['layout'])){
            $layout = $this->session->userdata('layout');
            if($layout)// session was gallery layout
                $this->displayTable($this->rosters->range_ordered_by($config['per_page'], $pagenum, $orderby));
            else
                $this->displayGallery($this->rosters->range_ordered_by($config['per_page'], $pagenum, $orderby));
        }
        else
            $this->displayTable($this->rosters->range_ordered_by($config['per_page'], $pagenum, $orderby));
        
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
        $this->table->set_heading('', 'Number', 'Name', 'Position','Status', 'Height');
        
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
    
    function orderby($orderby){
        if($orderby == "playerno"){
             $this->session->set_userdata('orderbyplayer', 'PlayerNo');
        }
        else if($orderby == "name") {
            $this->session->set_userdata('orderbyplayer', 'Name');
        }
        else if($orderby == "position") {
            $this->session->set_userdata('orderbyplayer', 'Pos');
        }
        else {
            $this->session->set_userdata('orderbyplayer', 'Code');
        }
        $this->index();
    }
}
