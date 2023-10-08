<?php

class Controller {
    protected $sections = [];
    protected $currentSection = null;

    public function view($view, $data = []) {
        require_once '../app/views/'. $view . '.php';

    }

}

