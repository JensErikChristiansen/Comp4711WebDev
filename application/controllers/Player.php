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
        $this->errors = array();
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
    
    function validate() {
        
        $player = $this->rosters->create();
        foreach ($_POST as $key => $value) {
            $player->$key = $_POST[$key];
        }
        //$player = $this->session->get_userdata('tempPlayer');
        if (empty($player->Name)) {
            $this->errors[] = 'You must enter a name.';
        }
        
//        if ($this->rosters->exists($this->db->where('playerNo ==', $player->playerNo))) {
//            $this->errors[] = 'jersey number already exists';
//        }
        
        if (count($this->errors) > 0) {
            $this->displayPlayer($player->ID, $player);
            return; // make sure we don't try to save anything
        }
        
        $this->errors = array();
        
    }

    function displayPlayerFromDatabase($ID) {
        $player = array();
        $player = $this->rosters->get($ID);
        
        // store player in session
        $this->session->set_userdata('tempPlayer', $player);
        return $player;
        
    }
    
    function createPlayer() {
        $player = $this->rosters->create();
        
        $player->ID = $this->rosters->highest() + 1;
        $player->PlayerNo = '';
        $player->Name = '';
        $player->Pos = '';
        $player->Status = '';
        $player->Height = '';
        $player->Weight = '';
        $player->Birthdate = date(DATE_ATOM);
        $player->Experience = '';
        $player->College = '';
        $player->Code = '';
        $player->Photo = 'default.jpg';
        //$player->PlayerUpdated = 'e';
        $this->session->set_userdata('tempPlayer', $player);
        return $player;
    }

    // add to an order
    function displayPlayer($ID = null, $player = null) {
        $this->session->set_userdata('editPage', '/player/displayPlayer/' . $ID);
        
        // If null, we are creating a new player
        if ($ID === null) {
            $player = $this->createPlayer();
        } else if ($player === null) {
            $player = $this->displayPlayerFromDatabase($ID);
        }
        
        // determine if we're in edit mode
        if (isset($_SESSION['editMode'])) {
            $editMode = $this->session->userdata('editMode');
        } else {
            $editMode = FALSE;
        }
        
        $message = '';
        
        if (count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
              $message .= $booboo . "<BR>";
        }
        
        $this->data['message'] = $message;
        
        // make text fields for each key value pair
        foreach ($player as $key => $val) {
            $this->data[$key] = makeTextField($key, $key, $val, "", 40, 15, !$editMode);
        }
        
        // override previous foreach loop: ID and Photo are not text fields
        $this->data['ID'] = $player->ID;
        $this->data['Photo'] = $player->Photo;
        
        $this->data['Submit'] = "";
        $this->data['Cancel'] = "";
        $this->data['Delete'] = "";
        
        // if editMode is set and we're in edit mode, display CRUD controls
        if (isset($_SESSION['editMode']) && $this->session->userdata('editMode')) {
            $this->data['Submit'] = makeSubmitButton('Save', "Save",
            'btn-success');
            $this->data['Cancel'] = makeCancelButton('Cancel', "Cancel",
            'btn-primary');
            $this->data['Delete'] = makeDeleteButton('Delete', "Delete",
            'btn-danger', $ID);
        }

        $this->data['pagebody'] = 'player';
        
        $this->render();
    }
    
    function cancel(){
        redirect('/roster');
    }
    
    function delete($ID){
       $this->rosters->delete($ID);
       redirect('/roster');
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
