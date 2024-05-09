<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    private function getUsers() {
        return User::where('id', '!=', Auth::user()->id)->get();
    }

    public function index() {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('Users.index', compact('users'));
    }

    public function store(CreateRequest $request) {
        $imageUser = parent::setImg($request, "public/users");

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "img" => $imageUser,
        ]);

        $table = view('Users.table', ["data" => $this->getUsers()]);
        return response($table, 200);
    }

    public function update(UpdateRequest $request) {
        $user = User::findOrFail($request->id);

        if($request->hasFile('img')) {
            Storage::delete("public/users/" . $request->img);
        }

        $newImage = parent::setImg($request, "public/users");
        $oldImage = $user->img;
        $imageUser = parent::imageUpdate($newImage, $oldImage);

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "img" => $imageUser,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Berhasil mengubah data!",
            "data" => $user,
        ]);
    }

    public function delete($id) {
        User::findOrFail($id)->delete();

        return response()->json([
            "success" => true,
            "message" => "Berhasil menghapus data!"
        ]);
    }
}
