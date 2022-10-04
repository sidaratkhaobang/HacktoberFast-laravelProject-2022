<?php

namespace App\Repositories;

use App\Repositories\SideBarLink;
use Illuminate\Support\Str;

class SideBarSubmenu
{
    public $title;
    public $menus;

    function __construct($title, $menus = [])
    {
        $this->title = $title;
        $this->menus = $menus;
    }

    function render()
    {
        $current_url = url()->current();
        $is_open = false;
        foreach ($this->menus as $menu) {
            if (is_a($menu, SideBarLink::class)) {
                if (Str::startsWith($current_url, $menu->link)) {
                    $is_open = true;
                    $menu->is_active = true;
                    break;
                }
            } else if (is_a($menu, SideBarSubmenu::class)) {
                foreach ($menu->menus as $_menu) {
                    if (is_a($_menu, SideBarLink::class)) {
                        if (Str::startsWith($current_url, $_menu->link)) {
                            $is_open = true;
                            $_menu->is_active = true;
                            break;
                        }
                    }
                }
            }
        }
        return view('components.sidebar-submenu', [
            'title' => $this->title,
            'menus' => $this->menus,
            'is_open' => $is_open
        ])->render();
    }
}
