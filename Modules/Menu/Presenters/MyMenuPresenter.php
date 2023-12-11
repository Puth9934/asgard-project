<?php

namespace Modules\Menu\Presenters;

use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Nwidart\Menus\MenuItem;
use Nwidart\Menus\Presenters\Presenter;

class MyMenuPresenter extends Presenter
{
    public function setLocale($item)
    {
        if (Str::startsWith($item->url, 'http')) {
            return;
        }
        if (LaravelLocalization::hideDefaultLocaleInURL() === false) {
            $item->url = LaravelLocalization::setLocale() . '/' . preg_replace('%^/?' . LaravelLocalization::setLocale() . '/%', '$1', $item->url);
        }
    }
    /**
     * {@inheritdoc }.
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL . '<ul class="nav navbar-nav menu_nav mx-auto">' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getCloseTagWrapper()
    {
        return PHP_EOL . '</ul>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        $this->setLocale($item);
        return '<li class="nav-item '. $this->getActiveState($item, 'active') .'"><a class="nav-link" href="'. $item->getUrl() .'" >'. $item->title .'</a></li>' . PHP_EOL;
        // return '<li id="menu-'. $item->menu_slug .'"' . $this->getActiveState($item) . '><a href="' . $item->getUrl() . '" ' . $item->getAttributes() . '>' . $item->getIcon() . ' ' . $item->title . '</a></li>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getActiveState($item, $state = ' class="active"')
    {
        return $item->isActive() ? $state : null;
    }

    /**
     * Get active state on child items.
     *
     * @param $item
     * @param string $state
     *
     * @return null|string
     */
    public function getActiveStateOnChild($item, $state = 'active')
    {
        return $item->hasActiveOnChild() ? $state : null;
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithDropDownWrapper($item)
    {

        return '<li class="nav-item submenu dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">' . $item->title . '</a>
                    <ul class="dropdown-menu">
                        ' . $this->getChildMenuItems($item) . '
                    </ul>
                </li>'
                . PHP_EOL;

        // return '<li class="dropdown' . $this->getActiveStateOnChild($item, ' active') . '">
        //           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        //             ' . $item->getIcon() . ' ' . $item->title . '
        //             <b class="caret"></b>
        //           </a>
        //           <ul class="dropdown-menu">
        //             ' . $this->getChildMenuItems($item) . '
        //           </ul>
        //         </li>'

        // return '<li id="menu-'  . $item->id . '" class="'. $this->getActiveStateOnChild($item, ' active') .'"><a href="'. $item->getUrl() .'">'. $item->title .'</a>
        //             <ul class="dropdown">
        //                 ' . $this->getChildMenuItems($item) . '
        //             </ul>
        //         </li>'
        // . PHP_EOL;
    }

    /**
     * Get multilevel menu wrapper.
     *
     * @param MenuItem $item
     *
     * @return string`
     */
    public function getMultiLevelDropdownWrapper($item)
    {
        return '<li class="dropdown' . $this->getActiveStateOnChild($item, ' active') . '">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    ' . $item->getIcon() . ' ' . $item->title . '
                    <b class="caret pull-right caret-right"></b>
                  </a>
                    <ul class="dropdown-menu">
                        ' . $this->getChildMenuItems($item) . '
                    </ul>
                </li>'
        . PHP_EOL;
    }
}
