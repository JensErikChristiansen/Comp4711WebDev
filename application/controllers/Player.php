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
        $this->load->helper('formfields');
    }

    // start a new player addition...
    function newPlayer() {
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
    
    function updatePlayer($ID) {
        $postValues = array();
        $postValues = $this->input->post(NULL, TRUE);
        
        $player = array();
        $player = $this->rosters->get($ID);
        foreach($postValues as $key => $value) {
            $player->$key = $value;
        }
        $this->rosters->update($player);
        redirect('/roster');
    }
    
    function confirm($ID) {
       /* if ($ID === null) {
            $this->newPlayer();
        } else {
            
        }
        redirect('/player/display_player/' . $player_id);
        
        */
        $this->updatePlayer($ID);
    }

    // add to an order
    function display_player($player_id = null) {
        $this->session->set_userdata('editPage', '/player/display_player/'.$player_id);
        if ($player_id == null)
            redirect('/player/newPlayer');

        $this->data['pagebody'] = 'player';
        
        $player = array();
        $player = $this->rosters->get($player_id);
        if (isset($_SESSION['editMode'])) {
            $editMode = $this->session->userdata('editMode');
        }
        
        //function makeTextField($label, $name, $value, $explain = "", $maxlen = 40, $size = 25, $disabled = false) {

        foreach ($player as $key => $val) {
            $this->data[$key] = makeTextField($key, $key, $val, "", 40, 15, !$editMode);
        }
        
        $this->data['ID'] = $player->ID;
        $this->data['Photo'] = $player->Photo;
        if (isset($_SESSION['editMode'])) {
             if ($this->session->userdata('editMode')) {
                $this->data['Submit'] = makeSubmitButton('Save', "Click to save",
                'btn-success');
             }
             else{
                 $this->data['Submit'] = "";
             }
        }else
            $this->data['Submit'] = "";
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
