<?php

namespace App\Http\Controllers;

use App\Models\ProfileRT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index() {
        $profile = ProfileRT::first();
        return view('Profile.index', compact('profile'));
    }

    // public function store(Request $request) {

    //     $validator = Validator::make($request->all(), [
    //         "name" => "required|string|max:100",
    //         "img" => "nullable|image|mimes:png,jpg,jpeg|max:1000",
    //         "sambutan" => "required|string",
    //         "deskripsi" => "required|string"
    //     ]);

    //     if($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     $image = parent::setImg($request, 'img/profile');

    //     $store = ProfileRT::create([
    //         "name" => $request->name,
    //         "img" => $image,
    //         "sambutan" => $request->sambutan,
    //         "deskripsi" => $request->deskripsi,
    //         "deskripsi_kost" => $request->deskripsi_kost,
    //     ]);


    //     return response()->json([
    //         "success" => true,
    //         "message" => "Data berhasil disimpan",
    //         "data" => $store,
    //     ]);
    // }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            "jumlah_penduduk" => "required|numeric",
            "sambutan" => "required|string",
            "deskripsi" => "required|string",
            "deskripsi_kost" => "required|string",
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = ProfileRT::first();
        $data->update($request->all());

        return response()->json([
            "success" => true,
            "message" => "Data berhasil di update!"
        ]);
    }

    public function updateImage(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "img" => "image|mimes:png,jpg,jpeg|max:2048",
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profile = ProfileRT::first();
        if($request->img && File::exists('img/profile/' . $profile->img)) {
            File::delete('img/profile/' . $profile->img);
        } 
        $newImg = parent::setImg($request, 'img/profile');
        $updateImage = parent::imageUpdate($newImg, $profile->img);

        $profile->update([
            "name" => $request->name,
            "img" => $updateImage
        ]);

        return response()->json([
            "success" => true,
            "message" => "Berhasil mengubah foto!",
            "data" => $profile,
        ]);
    }

    public function deleteImage() {
        $profile = ProfileRT::first();
        if(File::exists('img/profile/' . $profile->img)) {
            File::delete('img/profile/' . $profile->img);
        }
        $profile->update(['img' => null]);

        return response()->json([
            "success" => true,
            "message" => "Berhasil menghapus foto!",
            "data" => $profile
        ], 200);

    }
}
