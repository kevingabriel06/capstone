<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function indexOrg(){
        $organizations = Organization::all();

        return view('create-activity', ['organizations'=> $organizations]);
    }
}
