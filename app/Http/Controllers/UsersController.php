<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $imageUser = parent::setImg($request, "img/users");

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "img" => $imageUser,
        ]);

        $table = view('Users.table', ['users' => $this->getUsers()]);
        return response($table, 200);
    }

    public function update(UpdateRequest $request) {
        $user = User::findOrFail($request->id);

        if($request->hasFile('img')) {
            File::delete("img/users/" . $request->img);
        }

        $newImage = parent::setImg($request, "img/users");
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

    public function updatePassword(UpdatePasswordRequest $request) {
        $user = User::findOrFail($request->id);
        
        $hashedPassword = Hash::make($request->password);
        $user->update(["password" => $hashedPassword]);

        return response()->json([
            "success" => true,
            "message" => "Berhasil mengubah password!"
        ], 200);
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        if(File::exists('img/users/' . $user->img)) {
            File::delete('img/users/' . $user->img);
        }

        $user->delete();
        
        return response()->json([
            "success" => true,
            "message" => "Berhasil menghapus data!"
        ]);
    }
}
