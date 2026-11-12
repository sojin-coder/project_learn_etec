<?php

class WelcomeController extends Controller {

    public function index() {
        $this->view('welcome');
    }
    public function about() {
        $this->view('about');
    }

}

