<?php

namespace App\Http\Controllers;

use App\Http\Requests\KostRequest;
use App\Models\Kost;
use Illuminate\Support\Facades\File;

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
        $image = parent::setImg($request, "img/kost");
        $harga = (int) str_replace(['Rp.', '.', ' '], '', $request->harga);
        $kontak = ltrim($request->kontak, '0');

        Kost::create([
            "name" => $request->name,
            "harga" => $harga,
            "kontak" => $kontak,
            "jenis" => $request->jenis,
            "alamat" => $request->alamat,
            "description" => $request->description,
            "img" => $image
        ]);

        $table = view('Kost.table', ['data' => $this->getKost()]);

        return response($table, 200); 
    }

    public function update(KostRequest $request) {
        $data = Kost::findOrFail($request->id);

        $image = parent::setImg($request, 'img/kost');
        if($image != null) File::delete('img/kost/' . $data->img);
        $imgUpdate = parent::imageUpdate($image, $data->img); 
        $harga = (int) str_replace(['Rp.', '.', ' '], '', $request->harga);
        $kontak = ltrim($request->kontak, '0');
        $data->update([
            "name" => $request->name,
            "harga" => $harga,
            "kontak" => $kontak,
            "jenis" => $request->jenis,
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

        if($data->img != null) File::delete('img/kost/' . $data->img);
        $data->delete();

        return response()->json([
            "success" => true,
            "message" => "Berhasil menghapus data!",
        ], 200);
    }
}
