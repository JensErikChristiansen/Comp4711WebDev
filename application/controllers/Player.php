<?php

/**
 * Order handler
 * 
 * Implement the different order handling usecases.
 * 
 * controllers/welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Player extends Application {

    function __construct() {
        parent::__construct();
        
    }

    // start a new player addition...
    function newplayer() {
        ///neworder is newplayer
        //order_num got changed to player_id
        $player_id = $this->rosters->highest() +1;
        $newplayer = $this->rosters->create();
       
        //from a form get all the player info
        //validate our form
        $newplayer->ID = $player_id;
        $newplayer->PlayerNo = 101;
        $newplayer->Name = 'John, Doe';
        $newplayer->Pos = 'G';
        $newplayer->Status = 'RES';
        $newplayer->Height = '6\'4"';
        $newplayer->Weight = 275;
        $newplayer->Birthdate = date(DATE_ATOM);
        $newplayer->Experience = 1;
        $newplayer->College = 'BCIT';
        $newplayer->Code = 'PIT';
        $newplayer->Photo = 'Default';
        $newplayer->PlayerUpdated = 'e';
        
        
        $this->rosters->add($newplayer); //add this to our buffer
        redirect('/player/display_player/' . $player_id);
        
       
    }

    // add to an order
    function display_player($player_id = null) {
        if ($player_id == null)
            redirect('/player/newplayer');

        $this->data['pagebody'] = 'player';
        
        $player = array();
        $player = $this->rosters->get($player_id);
                
        $this->data['Name'] = $player->Name;
        $this->data['Photo'] = $player->Photo;
        $this->data['PlayerNo'] = $player->PlayerNo;
        $this->data['Pos'] = $player->Pos;
        $this->data['Status'] = $player->Status;
        $this->data['Height'] = $player->Height;
        $this->data['Weight'] = $player->Weight;
        $this->data['Birthdate'] = $player->Birthdate;
        $this->data['Experience'] = $player->Experience;
        $this->data['College'] = $player->College;
        $this->data['Code'] = $player->Code;
        /*        $this->data['order_num'] = $order_num;
        
        $order = $this->orders->get($order_num);
        $this->data['title'] = "Order #".$order_num.'('.number_format($this->orders->total($order_num), 2).')';
        // Make the columns
        $this->data['meals'] = $this->make_column('m');
        $this->data['drinks'] = $this->make_column('d');
        $this->data['sweets'] = $this->make_column('s');

	// Bit of a hokey patch here, to work around the problem of the template
	// parser no longer allowing access to a parent variable inside a
	// child loop - used for the columns in the menu display.
	// this feature, formerly in CI2.2, was removed in CI3 because
	// it presented a security vulnerability.
	// 
	// This means that we cannot reference order_num inside of any of the
	// variable pair loops in our view, but must instead make sure
	// that any such substitutions we wish make are injected into the 
	// variable parameters
	// Merge this fix into your origin/master for the lab!
	$this->hokeyfix($this->data['meals'],$order_num);
	$this->hokeyfix($this->data['drinks'],$order_num);
	$this->hokeyfix($this->data['sweets'],$order_num);
	// end of hokey patch
*/	
        $this->render();
    }
/*
    // inject order # into nested variable pair parameters
    function hokeyfix($varpair,$order) {
	foreach($varpair as &$record)
	    $record->order_num = $order;
    }
    
    // make a menu ordering column
    function make_column($category) {
        //FIXME
        return $this->menu->some('category', $category);
        //return $items;
    }

    // add an item to an order
    function add($order_num, $item) {
        //FIXME
        
        $this->orders->add_item($order_num, $item);
        redirect('/order/display_menu/' . $order_num);
    }

    // checkout
    function checkout($order_num) {
        $this->data['title'] = 'Checking Out';
        $this->data['pagebody'] = 'show_order';
        $this->data['order_num'] = $order_num;
        //FIXME
        $this->data['okornot'] = $this->orders->validate($order_num) ? "" : "disabled";
        $this->data['total'] = number_format($this->orders->total($order_num),2);
        $items = $this->orderitems->group($order_num);
        foreach($items as $item)
        {
            $menuitem =$this->menu->get($item->item);
            $item->code = $menuitem->name;
            
        }

        $this->data['items'] =$items;
        
        $this->render();
    }

    // proceed with checkout
    function proceed($order_num) {
        //FIXME
        if(!$this->orders->validate($order_num))
            redirect('/order/display_menu/'.$order_num);
        $record = $this->orders->get($order_num);
        $record->date = date(DATE_ATOM);
        $record->status = 'c';
        $record->total = $this->orders->total($order_num);
        $this->orders->update($record);
        
        redirect('/');
    }

    // cancel the order
    function cancel($order_num) {
        //FIXME
        $this->orderitems->delete_some($order_num);
        $record = $this->orders->get($order_num);
        $record->status = 'x';
        $this->orders->update($record);
        
        redirect('/');
    }
*/
}
