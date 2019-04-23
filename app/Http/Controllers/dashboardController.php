<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }

    public function professor()
    {
        return redirect('/professor/courses');
    }

    public function student()
    {
        return redirect('/student/courses');
    }

}
