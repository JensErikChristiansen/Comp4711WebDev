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
        $this->playerTemp = $this->rosters->create();
    }
    
    function updatePlayer() {
        $postValues = array();
        $postValues = $this->input->post(NULL, TRUE);
        foreach($postValues as $key => $value) {
            $this->playerTemp->$key = $value;
        }
        $this->rosters->update($this->playerTemp);
        redirect('/roster');
    }

    
    function validate() {
        
        //$player = $this->rosters->create();
        foreach ($_POST as $key => $value) {
            $this->playerTemp->$key = $_POST[$key];
        }
        //$player = $this->session->get_userdata('tempPlayer');
        if (empty($this->playerTemp->Name)) {
            $this->errors[] = 'You must enter a name.';
        }
        
        // if ($this->rosters->exists($this->db->where('playerNo ==', $player->playerNo))) {
        //     $this->errors[] = 'jersey number already exists';
        // }

        if (count($this->errors) > 0) {
            $this->displayPlayer($this->playerTemp->ID, true);
            return; // make sure we don't try to save anything
        }
        
        $this->errors = array();
        
    }
    
    function displayPlayerFromDatabase($ID) {
        $this->playerTemp = $this->rosters->get($ID);
        $this->data['sumfin'] = "Photo: " . $this->playerTemp->Photo;
    }
    
    function createPlayer() {
        $this->playerTemp = $this->rosters->create();
        
        $this->playerTemp->ID = $this->rosters->highest() + 1;
        $this->playerTemp->PlayerNo = '';
        $this->playerTemp->Name = '';
        $this->playerTemp->Pos = '';
        $this->playerTemp->Status = '';
        $this->playerTemp->Height = '';
        $this->playerTemp->Weight = '';
        $this->playerTemp->Birthdate = date(DATE_ATOM);
        $this->playerTemp->Experience = '';
        $this->playerTemp->College = '';
        $this->playerTemp->Code = '';
        $this->playerTemp->Photo = 'default.jpg';
        //$player->PlayerUpdated = 'e';
    }

    function displayPlayer($ID = null, $invalid = false) {
        $this->session->set_userdata('editPage', '/player/displayPlayer/' . $ID);
        
        // If null, we are creating a new player
        if ($ID === null) {
            $this->createPlayer();
        } else if (!$invalid) {
            $this->displayPlayerFromDatabase($ID);
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
        foreach ($this->playerTemp as $key => $val) {
            $this->data[$key] = makeTextField($key, $key, $val, "", 40, 15, !$editMode);
        }
        
        // override previous foreach loop: ID and Photo are not text fields
        $this->data['ID'] = $this->playerTemp->ID;
        $this->data['Photo'] = $this->playerTemp->Photo;
        
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
    
}
