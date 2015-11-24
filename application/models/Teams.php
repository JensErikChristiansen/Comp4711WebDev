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
}
