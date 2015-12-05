<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Jens Christiansen, Rosanna Wubs, Nadia Dobrianskaia
 */
class History extends MY_Model {
    
    // Constructor
    public function __construct() {
        parent::__construct('standings', 'ID');
    }

    function getHistory() {
        $context = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
        $url = 'http://nfl.jlparry.com/scores/20140101';
        $xml = file_get_contents($url, false, $context);
        //$xml = simplexml_load_string($xml);
        
    }
}
