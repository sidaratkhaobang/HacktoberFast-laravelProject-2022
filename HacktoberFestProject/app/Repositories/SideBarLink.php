<?php

namespace App\Repositories;

class SideBarLink
{
    public $title;
    public $link;
    public $is_active;

    function __construct($title, $link = '#')
    {
        $this->title = $title;
        $this->link = $link;
        $this->is_active = false;
    }

    function render()
    {
        return view('components.sidebar-link', [
            'title' => $this->title,
            'link' => $this->link,
            'is_active' => $this->is_active
        ])->render();
    }
}
