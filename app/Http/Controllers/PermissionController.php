<?php

namespace App\Http\Controllers;

use App\Helpers\BadgeColorFormater;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permission.index',compact('permissions'));
    }
}
