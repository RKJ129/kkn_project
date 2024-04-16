<?php

namespace App\Http\Controllers;

use App\Models\ProfileRT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index() {
        $profile = ProfileRT::first();
        return view('Profile.index', compact('profile'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:100",
            "img" => "nullable|image|mimes:png,jpg,jpeg|max:1000",
            "sambutan" => "required|string",
            "deskripsi" => "required|string"
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = parent::setImg($request, 'public/profile');

        $store = ProfileRT::create([
            "name" => $request->name,
            "img" => $image,
            "sambutan" => $request->sambutan,
            "deskripsi" => $request->deskripsi,
        ]);


        return response()->json([
            "success" => true,
            "message" => "Data berhasil disimpan",
            "data" => $store,
        ]);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:100",
            "sambutan" => "required|string",
            "deskripsi" => "required|string"
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = ProfileRT::findOrFail($request->id);
        $data->update($request->all());

        return response()->json([
            "success" => true,
            "message" => "Data berhasil di update!",
            "data" => $data,
        ]);
    }

    public function updateImage(Request $request) {
        $validator = Validator::make($request->all(), [
            "img" => "required|image|mimes:png,jpg,jpeg|max:1000",
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $img = $request->file('img');
        $data = ProfileRT::findOrFail($request->id);

        if($data->img != "profile_default.jpeg") {
            File::delete('img/profile/' . $data->img);
        }
        $imgName = time() . "_" . $img->getClientOriginalName();
        
        $data->update(["img" => $imgName]);
        $img->move("img/profile", $imgName);
        
        return response()->json([
            "success" => true,
            "message" => "Berhasil mengubah foto!",
            "data" => $data,
        ]);
    }
}
