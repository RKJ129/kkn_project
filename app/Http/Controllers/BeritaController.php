<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeritaRequest;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{

    public function getData() {
        return Berita::all();
    }

    public function index() {
        $data = $this->getData();
        return view("Berita.index", compact('data'));
    }

    public function store(BeritaRequest $request) {
        $image = parent::setImg($request, 'public/berita');

        $store = Berita::create([
            "judul" => $request->judul,
            "description" => $request->description,
            "img" => $image
        ]);

        $table = view('Berita.table', ['data' => $this->getData()]);

        return response($table, 200);
    }

    public function update(BeritaRequest $request) {
        $image = parent::setImg($request, 'public/berita');

        $data = Berita::findOrFail($request->id);
        if($request->hasFile('img')) Storage::delete('public/berita/' . $data->img);
        $data->update([
            "judul" => $request->judul,
            "description" => $request->description,
            "img" => parent::imageUpdate($image, $data->img)
        ]);

        return response()->json([
            "success" => true,
            "message" => "Berhasil mengubah data!",
            "data" => $data
        ]);
    }

    public function delete($id) {
        try {
            $data = Berita::findOrFail($id);
            Storage::delete("public/berita/" . $data->img);
            $data->delete();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json(["success" => true, "message" => "Berhasil menghapus data!"]);
    }
}
