<?php

namespace App\Repositories;

use App\Repositories\SideBarLink;
use App\Repositories\SideBarSubmenu;

class SideBarMenuRepository
{
    public $groupMenus;

    function __construct()
    {
        $this->groupMenus = [
            new SideBarSubmenu('จัดการข้อมูล', [
                new SideBarLink('จัดการโปรไฟล์ผู้ใช้งาน', route('profiles.index')),
            ]),
        ];
    }

    function render()
    {
        $html = '';
        foreach ($this->groupMenus as $item) {
            $html .= $item->render();
        }
        return $html;
    }
}
