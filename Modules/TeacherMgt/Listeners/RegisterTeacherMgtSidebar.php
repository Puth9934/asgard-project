<?php

namespace Modules\TeacherMgt\Listeners;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterTeacherMgtSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('teachermgt'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('teachermgt::teachers.title.teachers'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.teachermgt.teacher.create');
                    $item->route('admin.teachermgt.teacher.index');
                    $item->authorize(
                        $this->auth->hasAccess('teachermgt.teachers.index')
                    );
                });
                $item->item(trans('teachermgt::subjects.title.subjects'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.teachermgt.subjects.create');
                    $item->route('admin.teachermgt.subjects.index');
                    $item->authorize(
                        $this->auth->hasAccess('teachermgt.subjects.index')
                    );
                });
                // $item->item(trans('teachermgt::departments.title.departments'), function (Item $item) {
                //     $item->icon('fa fa-copy');
                //     $item->weight(0);
                //     $item->append('admin.teachermgt.department.create');
                //     $item->route('admin.teachermgt.department.index');
                //     $item->authorize(
                //         $this->auth->hasAccess('teachermgt.departments.index')
                //     );
                // });
                // $item->item(trans('teachermgt::departments.title.departments'), function (Item $item) {
                //     $item->icon('fa fa-copy');
                //     $item->weight(0);
                //     $item->append('admin.teachermgt.department.create');
                //     $item->route('admin.teachermgt.department.index');
                //     $item->authorize(
                //         $this->auth->hasAccess('teachermgt.departments.index')
                //     );
                // });
                $item->item(trans('teachermgt::departments.title.departments'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.teachermgt.department.create');
                    $item->route('admin.teachermgt.department.index');
                    $item->authorize(
                        $this->auth->hasAccess('teachermgt.departments.index')
                    );
                });
// append








            });
        });

        return $menu;
    }
}
