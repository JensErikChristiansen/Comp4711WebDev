<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Jens Christiansen, Rosanna Wubs, Nadia Dobrianskaia
 */
class Teams extends MY_Model2 {
    
    // Constructor
    public function __construct() {
        parent::__construct('standings', 'ID', 'Code');
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

    // Retrieve an existing DB record as an object
    function getFromCode($code) {
        $this->db->where('Code', $code);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return null;
        return $query->row();
    }


    // 2015-12-02
    function updateStandings() {
        $xml = simplexml_load_file('temp.xml');

        $stuff = "";


        foreach ($xml->team as $element) {
            $team = $this->getFromCode($element['code']);
            $team->TeamName = (string)$element->fullname;
            $team->Conference = (string)$element['conference'];
            $team->Division = (string)$element['division'];

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

            $this->update($team);
        }


    }
}
