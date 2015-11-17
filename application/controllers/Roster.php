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
        $this->session->set_userdata('editPage', '/roster');
        $this->page(1);
    }
    
    function editMode() {
        if (!isset($_SESSION['editMode'])) {
            $this->session->set_userdata('editMode', true);
            redirect($this->session->userdata('editPage'));
        }

        if ($this->session->userdata('editMode')) {
            $this->session->set_userdata('editMode', false);
        } else {
            $this->session->set_userdata('editMode', true);
        }

        redirect($this->session->userdata('editPage'));
    }

    function page($pagenum) {  
        $orderby;
        //$this->load->library('pagination'); moved this to autoload
        $this->session->set_userdata('editPage', '/roster/page/'.$pagenum);
        //set the pagenum into a session variable
        $this->session->set_userdata('displayNumber', $pagenum);
        $this->data['pagebody'] = 'roster';

        if (isset($_SESSION['editMode']) && $this->session->userdata('editMode')) {
            $this->data['newPlayerButton'] = makeNewPlayerButton("Add New Player", 'btn btn-success');   
        } else {
            $this->data['newPlayerButton'] = "";
        }
        
       // $this->data['pagebody'] = 'roster';
        $config['base_url'] = '/roster/page';
		$config['total_rows'] = $this->rosters->size();
		$config['per_page'] = 12;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</li></a>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
        
        //first see if the session was set; if not, set the order of the display     
        if(isset($_SESSION['orderBy'])){
            $orderby = $this->session->userdata('orderBy');
        }
        else {
            $orderby = 'ID';
        }

        //first see if the session was set if not set display table layout               
        if(isset($_SESSION['layout'])){
            if($this->session->userdata('layout') == "GALLERY") {
                $this->displayTable($this->rosters->range_ordered_by($config['per_page'], $pagenum, $orderby));
            }
            else {
                $this->displayGallery($this->rosters->range_ordered_by($config['per_page'], $pagenum, $orderby));
            }
        }
        else {
            $this->displayTable($this->rosters->range_ordered_by($config['per_page'], $pagenum, $orderby));
        }
        $this->render();
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
        
        $this->session->set_userdata('layout', $layout);
        
        // Redisplay current page
        if(isset($_SESSION['displayNumber'])){
            $displayNum = $this->session->userdata('displayNumber');
            $this->page($displayNum);
        }
        else {
            // default to first page if displayNumber session variable
            // was not set.
            $this->page(1);
        }
    }
    
    function orderBy($orderBy){
        if($orderBy == "playerno"){
             $this->session->set_userdata('orderBy', 'PlayerNo');
        }
        else if($orderBy == "name") {
            $this->session->set_userdata('orderBy', 'Name');
        }
        else if($orderBy == "position") {
            $this->session->set_userdata('orderBy', 'Pos');
        }
        else {
            $this->session->set_userdata('orderBy', 'Code');
        }
        $this->index();
    }
}
