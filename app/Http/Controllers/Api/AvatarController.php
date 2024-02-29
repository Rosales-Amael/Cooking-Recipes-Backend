<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AvatarController extends Controller
{

    public function updateAvatar(AvatarRequest $request){
        $user = User::find(auth()->id());
        $data = $request->validated();

        $avatar = $request->file('avatar');
        $avatarPath = $avatar->store('avatars', 'public');
        $user->update(['avatar' => $avatarPath]);

        return response()->json(['path' => $avatarPath, 'success' => 'Avatar modifié']);
    }
}
