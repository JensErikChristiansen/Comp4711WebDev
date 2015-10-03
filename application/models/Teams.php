<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Jens Christiansen, Rosanna Wubs, Nadia Dobrianskaia
 */
class Teams extends CI_Model {

    var $data = array(
        array('id' => 'NE', 'name' => 'New England Patriots', 'logo' => '/assets/data/img/nfl-logo.jpg', 'where'=>'/league',
            'wins' => '5', 'losses' => '1', 'ties' => '18'),
        array('id' => 'PIT', 'name' => 'Pittsburg Steelers', 'logo' => '/assets/data/img/nfl-logo.jpg', 'where'=>'/roster',
            'wins' => '50', 'losses' => '10', 'ties' => '180'),
        array('id' => 'CLE', 'name' => 'Cleveland Browns', 'logo' => '/assets/data/img/nfl-logo.jpg', 'where'=>'/league',
            'wins' => '25', 'losses' => '5', 'ties' => '9')
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    /*
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }
    */

    // retrieve all of the quotes
    public function all() {
        return $this->data;
    }

    /*
    // retrieve the first quote
    public function first() {
        return $this->data[0];
    }

    // retrieve the last quote
    public function last() {
        $index = count($this->data) - 1;
        return $this->data[$index];
    }
    */
}
