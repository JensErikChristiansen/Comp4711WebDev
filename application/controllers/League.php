<?php

/**
 * @author Rosanna Wubs and Nadia Dobrianskaia (pair programming)
 */
class League extends Application {

    function __construct() {
       parent::__construct();
        if(!isset($_SESSION['orderbyteam'])) {
            $this->session->set_userdata('orderbyteam', 'Code');
        }
    }

    public function index()
    {
        $this->session->set_userdata('editPage', '/league');
        $this->data['pagebody'] = 'league';
        
        $orderBy = $this->session->userdata('orderbyteam');

        // if (isset($_SESSION['groupBy'])) {
        //     $groupBy = $this->session->userdata('groupBy');
        //     //$groups = $this->teams->orderAndGroup($orderBy, $groupBy);
            
        // }
        $groupBy = $this->session->userdata('groupBy');
        switch($groupBy) {
            case 'LEAGUE':
                $this->displayLeague();
                break;
            case 'AreaSeason':
                $this->displayConference();
                break;
            case 'Division':
                $this->displayDivision();
                break;
            default:
                $this->displayLeague();
                break;
        }
        
        //$data = $this->teams->orderAndGroup($orderBy, $groupBy);
        //$this->data['teams'] = $this->teams->all_ordered_by($orderBy);
        //$this->displayConference($this->teams->all_ordered_by($orderBy));
        $this->render();
    }

    function displayLeague() {
        $this->data['thetable'] = "";
        $orderBy = $this->session->userdata('orderbyteam');
        $this->data['thetable'] .= heading("League", 2, 'class=""');
        $this->data['thetable'] .= $this->createTable($this->teams->all_ordered_by($orderBy));
    }

    function displayConference() {
        $this->data['thetable'] = "";
        $conferences = $this->teams->getGroups('AreaSeason');
        $orderBy = $this->session->userdata('orderbyteam');
        $this->data['thetable'] .= heading("Conferences", 2, 'class=""');

        foreach ($conferences as $conference) {
            $this->data['thetable'] .= heading($conference->AreaSeason, 3, 'class="areaSeasonHeading"');
            $this->data['thetable'] .= $this->createTable($this->teams->some(
                'AreaSeason', $conference->AreaSeason, $orderBy));
        }
    }

    function displayDivision() {
        $this->data['thetable'] = "";
        $orderBy = $this->session->userdata('orderbyteam');
        $conferences = $this->teams->getGroups('AreaSeason');
        $this->data['thetable'] .= heading("Divisions", 2, 'class=""');

        foreach ($conferences as $conference) {
            $this->data['thetable'] .= heading($conference->AreaSeason, 3, 'class="areaSeasonHeading"');
            $divisions = $this->teams->getGroups('League');
            
            foreach ($divisions as $division) {
                if ($division->AreaSeason == $conference->AreaSeason) {
                    $this->data['thetable'] .= heading($division->League, 4, 'class="divisionHeading"');
                    $this->data['thetable'] .= $this->createTable($this->teams->some(
                        'League', $division->League, $orderBy));
                }
                
            }
        }
    }

    function createTable($arr) {
        $this->table->set_heading(  "Logo",
                                    anchor("/league/orderBy/id", "Code"),
                                    anchor("/league/orderBy/name", "Name"),
                                    anchor("/league/orderBy/wins", "Wins"),
                                    anchor("/league/orderBy/losses", "Losses"),
                                    "League");

        foreach($arr as $row) {
            $this->table->add_row(  img(array('src'=>'/assets/data/img/' . $row->TeamLogo)),
                                    $row->Code,
                                    $row->TeamName,
                                    $row->W,
                                    $row->L,
                                    $row->League);
        }

        $parms = array(
            'table_open' => '<table class="table">'
        );

        $this->table->set_template($parms);

        //$this->data['thetable'] = $this->table->generate();
        return $this->table->generate();
    }
    
    function orderBy($order){
        if($order == "name"){
             $this->session->set_userdata('orderbyteam', 'TeamName');
        }
        else if($order == "wins") {
            $this->session->set_userdata('orderbyteam', 'W');
        }
        else if($order == "losses") {
            $this->session->set_userdata('orderbyteam', 'L');
        }
        else {
            $this->session->set_userdata('orderbyteam', 'Code');
        }
        $this->index();
    }

    function groupBy($type) {
        switch ($type) {
            case "LEAGUE":
                $this->session->unset_userdata('groupBy');
                break;
            case "CONFERENCE":
                $this->session->set_userdata('groupBy', 'AreaSeason');
                break;
            case "DIVISION":
                $this->session->set_userdata('groupBy', 'Division');
                break;
            default:
                $this->session->unset_userdata('groupBy');
                break;
        }


        $this->index();
    }
}
