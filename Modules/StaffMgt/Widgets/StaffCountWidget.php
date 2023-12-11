<?php

namespace Modules\StaffMgt\Widgets;


use Modules\Dashboard\Foundation\Widgets\BaseWidget;
use Modules\Staffmgt\Entities\department;
use Modules\StaffMgt\Entities\Staff;
use Modules\StaffMgt\Repositories\StaffRepository;

class StaffCountWidget extends BaseWidget
{

    private $staff;

    public function __construct(StaffRepository $staff)
    {
        $this->staff = $staff;
    }

    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'StaffCountWidget';
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'staffmgt::admin.widgets.staff-count';
    }

    /**
     * Get the widget data to send to the view
     * @return string
     */
    protected function data()
    {
        // staffCount to throw var to staff-count.blade.php
        return [
            'staffCount' => Staff::all()->count(),
            'trashCount' => Staff::onlyTrashed()->count(),
            'department' => department::all()->count(),
            
        ];

    }

    /**
    * Get the widget type
    * @return string
    */
    protected function options()
    {
        return [
            'width' => '10',
            'height' => '2',
            'x' => '0',
        ];
    }
}
