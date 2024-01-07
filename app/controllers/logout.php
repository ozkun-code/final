<?php

class Logout extends Controller
{
    public function index()
    {
        // Check if a session is active
        if (session_status() == PHP_SESSION_ACTIVE) {
            // If active, then destroy the session
            session_destroy();
        }

        // Redirect to the home page
        $this->view('home/index');
    }
}
