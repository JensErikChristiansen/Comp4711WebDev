<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Jens Christiansen, Rosanna Wubs, Nadia Dobrianskaia
 */
class Teams extends MY_Model {
    
    // Constructor
    public function __construct() {
        parent::__construct('standings', 'ID');
    }

    function getGroups($group) {
    	//$this->db->select($group);
    	$this->db->group_by($group);
        $query = $this->db->get($this->_tableName);
        return $query->result();
    }

    function orderAndGroup($order, $group) {
        $this->db->order_by($order, 'asc');
        $this->db->group_by($group);
        $query = $this->db->get($this->_tableName);
        return $query->result();
    }

    // Retrieve a team based on its Code instead of ID.
    function getFromCode($code) {
        $this->db->where('Code', $code);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return null;
        return $query->row();
    }


    // 2015-12-02
    // Fetch XML data and update standings table in db
    function updateStandings() {
        // get xml file from website
        $xml = simplexml_load_file('http://www.nfl.jlparry.com/standings');

        // original statement to load local xml file
        // $xml = simplexml_load_file('temp.xml');

        // The parent element (besides <standings>) is <team>.
        // Therefore, we will iterate through each <team>.
        foreach ($xml->team as $element) {

            /* Fetch the actual team from db. I originally 
                had just used $team = $this->create() and populated
                $team with the xml data, but it wouldn't have
                included things like the ID and TeamLogo uri.
            */
            $team = $this->getFromCode($element['code']);

            // doesn't work because ID and TeamLogo will be null when we update the db!
            // $team = $this->create();

            /* get ATTRIBUTES from <team> by treating $element
                like an associative array. Example attributes:

                    code="ARI"
                    conference="National Football Conference"
                    division="NFC"

            */
            $team->Conference = (string)$element['conference'];
            $team->Division = (string)$element['division'];

            /* Access CHILD ELEMENTS by treating 
                $element like an object:*/
            $team->TeamName = (string)$element->fullname;

            /* Drill down through child elements by treating
                $element like an object: */
            // totals
            $team->W = (int)$element->totals->wins;
            $team->L = (int)$element->totals->losses;
            $team->T = (int)$element->totals->ties;
            $team->PF = (int)$element->totals->for;
            $team->PA = (int)$element->totals->against;
            $team->Net_Pts = (int)$element->totals->net;

            // breakdown
            $team->Home = (string)$element->breakdown->home;
            $team->Road = (string)$element->breakdown->road;
            $team->Indiv = (string)$element->breakdown->indiv;
            $team->Conf = (string)$element->breakdown->inconf;
            $team->NonConf = (string)$element->breakdown->nonconf;

            // recent
            $team->Streak = (string)$element->recent->streak;
            $team->Last_5 = (string)$element->recent->last5;

            // Finally, update the db.
            $this->update($team);
        }
    }

    function makeRequest() {

    }
}
