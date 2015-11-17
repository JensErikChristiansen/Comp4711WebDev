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
    
    function updatePlayer() {
        $playerTemp = $this->parsePlayerBuffer();

        $postValues = array();
        $postValues = $this->input->post(NULL, TRUE);

        foreach($postValues as $key => $value) {
            $playerTemp->$key = $value;
        }

        $this->rosters->update($playerTemp);
        redirect('/roster');
    }

    function validate() {
        $playerTemp = $this->parsePlayerBuffer();

        foreach ($_POST as $key => $value) {
            $playerTemp->$key = $_POST[$key];
        }

        $this->session->set_userdata('playerTemp', $playerTemp);

        // check if name is empty
        if (empty($playerTemp->Name)) {
            $this->errors[] = 'You must enter a name.';
        }
        
        // check if player number is already in database
        if ($this->rosters->exists('PlayerNo', $playerTemp->PlayerNo)) {
            $this->errors[] = 'jersey number already exists';
        }

        // check if position is valid
        $positions = array(
            "C", "DB", "DE", "DL", "DT", "E", "FB", "FL", "G", "HB", "K", 
            "LB", "MLB", "NG", "NT", "OG", "OL", "OLB", "OT", "P", "QB", 
            "RB", "S", "SE", "T", "TB", "TE", "WB", "WR"
        );

        for ($i = 0; $i < count($positions); $i++) {
            if (strtolower($playerTemp->Pos) == strtolower($positions[$i])) {
                break;
            }
            if ($i == count($positions) - 1) {
                $this->errors[] = 'must have a valid position';
            }
        }

        if (count($this->errors) > 0) {
            $this->displayPlayer($playerTemp->ID, true);
            return; // make sure we don't try to save anything
        }

        if ($this->rosters->exists($playerTemp->ID)) {
            $this->updatePlayer();
        } else {
            $this->rosters->add($playerTemp);
        }
        
        redirect('/roster');
        
    }
    
    function loadPlayerFromDb($ID) {
        $playerTemp = $this->rosters->get($ID);
        $this->session->set_userdata('playerTemp', $playerTemp);
        return $playerTemp;
    }
    
    function createPlayer() {
        $playerTemp = $this->rosters->create();
        
        $playerTemp->ID = $this->rosters->highest() + 1;
        $playerTemp->PlayerNo = '';
        $playerTemp->Name = '';
        $playerTemp->Pos = '';
        $playerTemp->Status = '';
        $playerTemp->Height = '';
        $playerTemp->Weight = '';
        $playerTemp->Birthdate = date(DATE_ATOM);
        $playerTemp->Experience = '';
        $playerTemp->College = '';
        $playerTemp->Code = '';
        $playerTemp->Photo = 'default.jpg';
        $this->session->set_userdata('playerTemp', $playerTemp);
        //$player->PlayerUpdated = 'e';

        return $playerTemp;
    }

    function displayPlayer($ID = null, $invalidEntry = false) {
        $this->session->set_userdata('editPage', '/player/displayPlayer/' . $ID);
        
        // If null, we are creating a new player
        if ($ID === null) {
            $playerTemp = $this->createPlayer();
        // If displayPlayer is being recalled from validation, it is therefore invalid.
        } else if ($invalidEntry) {
            $playerTemp = $this->parsePlayerBuffer();
        // Retrieve player from database with ID
        } else {
            $playerTemp = $this->loadPlayerFromDb($ID);
        }
        
        // determine if we're in edit mode
        if (isset($_SESSION['editMode'])) {
            $editMode = $this->session->userdata('editMode');
        } else {
            $editMode = FALSE;
        }
        
        $message = '';
        
        if (count($this->errors) > 0) {
            foreach ($this->errors as $booboo) {
                $message .= $booboo . "<BR>";
            }
        }
        
        $this->data['message'] = $message;
        
        // make text fields for each key value pair
        foreach ($playerTemp as $key => $val) {
            $this->data[$key] = makeTextField($key, $key, $val, "", 40, 15, !$editMode);
        }
        
        // override previous foreach loop: ID and Photo are not text fields
        $this->data['ID'] = $playerTemp->ID;
        $this->data['Photo'] = $playerTemp->Photo;
        
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

    // Utility function to get player session variable and convert it
    // to an active record object.
    function parsePlayerBuffer() {
        $playerBuffer = $this->session->userdata('playerTemp');
        $playerTemp = $this->rosters->create();

        foreach($playerBuffer as $key => $value) {
            $playerTemp->$key = $value;
        }

        return $playerTemp;
    }
    
}
