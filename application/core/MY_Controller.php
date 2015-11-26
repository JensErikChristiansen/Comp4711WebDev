<?php

/**
 * core/MY_Controller.php
 * authors: Pair programming Rosanna and Nadia
 * Default application controller
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;		  // identifier for our content
    protected $choices = array(// our menu navbar
	'Home' => '/', 'League'=>'/league', 'Roster'=> '/roster',  'About'=> '/about'
    );

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct() {
        parent::__construct();
    	$this->data = array();
    	$this->data['pagetitle'] = 'Steelers';

        if (!isset($_SESSION['editMode'])) {
            $this->session->set_userdata('editMode', 'OFF');
        }
    }

    /**
     * Render this page
     */
    function render()
    {
    	$this->data['menubar'] = build_menu_bar($this->choices);
        $this->data['EditMode'] = $this->session->userdata('editMode') ? "ON" : "OFF";
    	$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
    	$this->data['data'] = $this->data;
    	$this->parser->parse('_template', $this->data);
        $this->data['caboose_styles'] = $this->caboose->styles();
        $this->data['caboose_scripts'] = $this->caboose->scripts();
        $this->data['caboose_trailings'] = $this->caboose->trailings();
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */