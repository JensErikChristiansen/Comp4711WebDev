<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of League
 *
 * @author Rosanna Wubs and Nadia Dobrianskaia (pair programming)
 */
class League extends Application {
    public function index()
    {

            //$this->load->view('welcome');
        $this->data['pagebody'] = 'league';
        $this->render();
    }
}
