<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\myResource;
use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    public function index() {
        $kost = Kost::all();

        return new myResource(true, "Data Kost", $kost);
    }
}
