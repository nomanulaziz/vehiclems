<?php
namespace Http\Controllers;

class Pages
{
    // ========================================================
    // Function to Display About Page
    // ========================================================
    public function about()
    {
        view('about.view.php', [
            'heading' => 'About Page'
        ]);
    }

    // ========================================================
    // Function to Display Contact Page
    // ========================================================
    public function contact()
    {
        view('contact.view.php', [
            'heading' => 'Contact Page'
        ]);
    }
}