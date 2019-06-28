<?php

namespace Icg\Sidebar;

use Maatwebsite\Sidebar\Presentation\SidebarRenderer;

class SidebarCreator {

    /**
     *
     * @var [BackendSidebar]
     */
    protected $sidebar;

    /**
     * @var [SidebarRenderer]
     */
    protected $renderer;

    /**
     * @param BackendSidebar  $sidebar  [description]
     * @param SidebarRenderer $renderer [description]
     */
    public function __construct(BackendSidebar $sidebar, SidebarRenderer $renderer) {
        $this->sidebar  = $sidebar;
        $this->renderer = $renderer;
    }

    /**
     * [create description]
     * @param  [type] $view [description]
     */
    public function create($view) {
        $view->sidebar = $this->renderer->render($this->sidebar);
    }
}
