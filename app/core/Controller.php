<?php

class Controller {
    protected $sections = [];
    protected $currentSection = null;

    public function view($view, $data = []) {
        require_once '../app/views/'. $view . '.php';

    }

    public function section($name) {
        ob_start();
        $this->currentSection = $name;
    }

    public function endSection() {
        if ($this->currentSection) {
            $this->sections[$this->currentSection] = ob_get_clean();
            $this->currentSection = null;
        }
    }

    public function renderSection($name) {
        echo $this->sections[$name] ?? '';

    }
}

