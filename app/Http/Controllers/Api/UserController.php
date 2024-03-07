<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editUser(EditUserRequest $request){
        $user = User::find(auth()->id());
        $user->update($request->validated());
        return response()->json(['success' => 'Profil mis à jour !']);
    }

    public function deleteUser(){
        $user = User::find(auth()->id());
        $user->delete();
        return response()->json(['success' => 'L\'utilisateur a bien été supprimer !']);

    }
}
