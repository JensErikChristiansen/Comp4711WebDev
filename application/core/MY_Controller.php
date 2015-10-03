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
    function __construct()
    {
	parent::__construct();
//        $this->load->helper('common');
 //       $this->load->helper('url');
//        $autoload['helper'] = array('common', 'url');
 //       $this->load->library('parser');
	$this->data = array();
	$this->data['pagetitle'] = 'Steelers';
        
    }

    /**
     * Render this page
     */
    function render()
    {
	$this->data['menubar'] = build_menu_bar($this->choices);
	$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
	$this->data['data'] = $this->data;
	$this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */