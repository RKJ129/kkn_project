<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\myResource;
use App\Models\ProfileRT;

class ProfileController extends Controller
{
    public function index() {
        $data = ProfileRT::all();

        return new myResource(true, "Data Profile RT", $data);
    }
}
