<?php

namespace Modules\Student\Listeners;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterStudentSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('student::students.title.students'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('student::students.title.students'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.student.student.create');
                    $item->route('admin.student.student.index');
                    $item->authorize(
                        $this->auth->hasAccess('student.students.index')
                    );
                });
                $item->item(trans('student::departments.title.departments'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.student.department.create');
                    $item->route('admin.student.department.index');
                    $item->authorize(
                        $this->auth->hasAccess('student.departments.index')
                    );
                });
                $item->item(trans('student::groups.title.groups'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.student.group.create');
                    $item->route('admin.student.group.index');
                    $item->authorize(
                        $this->auth->hasAccess('student.groups.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
