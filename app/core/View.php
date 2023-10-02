<?php

class View {
    protected $sections = [];
    protected $currentSection;

    public function extend($file) {
        ob_start();
        include $file;
        $this->sections['content'] = ob_get_clean();
    }

    public function section($name) {
        $this->currentSection = $name;
        ob_start();
    }

    public function endsection() {
        $this->sections[$this->currentSection] = ob_get_clean();
    }

    public function render($name) {
        echo $this->sections[$name];
    }
}
