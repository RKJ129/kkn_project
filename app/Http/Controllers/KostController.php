<?php

namespace App\Http\Controllers;

use App\Http\Requests\KostRequest;
use App\Models\Kost;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KostController extends Controller
{
    private function getKost() {
        return Kost::all();
    }

    public function index() {
        $data = Kost::all();
        return view('Kost.index', compact('data'));
    }

    public function store(KostRequest $request) {
        $image = parent::setImg($request, "public/kost");

        Kost::create([
            "name" => $request->name,
            "harga" => $request->harga,
            "kontak" => $request->kontak,
            "alamat" => $request->alamat,
            "description" => $request->description,
            "img" => $image
        ]);

        $table = view('Kost.table', ['data' => $this->getKost()]);

        return response($table, 200);
    }

    public function update(KostRequest $request) {
        $data = Kost::findOrFail($request->id);

        $image = parent::setImg($request, 'public/kost');
        if($request->hasFile('img')) Storage::delete('public/kost/' . $data->img);
        $imgUpdate = parent::imageUpdate($image, $data->img); 
        $data->update([
            "name" => $request->name,
            "harga" => $request->harga,
            "kontak" => $request->kontak,
            "alamat" => $request->alamat,
            "description" => $request->description,
            "img" => $imgUpdate
        ]);
        
        return response()->json([
            "success" => true,
            "message" => "Berhasil mengubah data!",
            "data" => $data
        ], 200);
    }

    public function delete($id) {
        $data = Kost::findOrFail($id);

        if($data->img != null) Storage::delete('public/kost/' . $data->img);
        $data->delete();

        return response()->json([
            "success" => true,
            "message" => "Berhasil menghapus data!",
        ], 200);
    }
}
