<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Steelers Website for educational purposes.
 * Authors: Pair Programming Rosanna and Nadia adding the Welcome homepage
 */
class History extends Application {

	function __construct() {
		parent::__construct();
	}

	// public function index() {
 //        $this->data['pagebody'] = 'league';
 //        $this->render();
	// }

    function updateStandings() {
        $xml = simplexml_load_file('temp.xml');

        $stuff = "";

        $team = $this->teams->create();

        foreach ($xml->team as $element) {
            $team->Code = $element['code'];
            $team->TeamName = $element->fullname;
            $team->Conference = $element['conference'];
            $team->Division = $element['division'];

            // totals
            $team->W = $element->totals->wins;
            $team->L = $element->totals->losses;
            $team->T = $element->totals->ties;
            $team->PF = $element->totals->for;
            $team->PA = $element->totals->against;
            $team->Net_Pts = $element->totals->net;

            // breakdown
            $team->Home = $element->breakdown->home;
            $team->Road = $element->breakdown->road;
            $team->Indiv = $element->breakdown->indiv;
            $team->Conf = $element->breakdown->inconf;
            $team->NonConf = $element->breakdown->nonconf;

            // recent
            $team->Streak = $element->recent->streak;
            $team->Last_5 = $element->recent->last5;

            // update or add team to db
            if ($this->teams->exists($team->Code)) {
                echo "exists";
                $this->teams->update($team);
            } else {
                echo "doesn't exist";
                $this->teams->add($team);
            }
        }

    }

	
}
