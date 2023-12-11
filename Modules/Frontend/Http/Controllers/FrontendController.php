<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Staffmgt\Entities\department;
use Modules\StaffMgt\Entities\Staff;

class FrontendController extends BasePublicController
{
    public function homepage(){
        return view('frontend::homepage');
        // call from homepage.blade
    }

    public function stafflist(){
        $staffs = Staff::all();
        return view('frontend::staff', compact('staffs'));
    }

    public function staffDetail(Request $request){
        // dd($request->id);
        $staff = Staff::findOrFail($request->id);
        // dd($staff);
        return view('frontend::Staff-detail', compact('staff'));
    }

    public function department(){
        $departments = department::all();
        return view('frontend::department', compact('departments'));
    }
}
