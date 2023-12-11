<?php

namespace Modules\StaffMgt\Listeners;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterStaffMgtSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('staffmgt'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('staffmgt::staff.title.staff'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.staffmgt.staff.create');
                    $item->route('admin.staffmgt.staff.index');
                    $item->authorize(
                        $this->auth->hasAccess('staffmgt.staff.index')
                    );
                });
                $item->item(trans('staffmgt::departments.title.departments'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.staffmgt.department.create');
                    $item->route('admin.staffmgt.department.index');
                    $item->authorize(
                        $this->auth->hasAccess('staffmgt.departments.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
