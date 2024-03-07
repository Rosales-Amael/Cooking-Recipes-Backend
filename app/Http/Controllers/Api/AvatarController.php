<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{

    public function updateAvatar(AvatarRequest $request){
        $user = User::find(auth()->id());
        $avatar = $request->validated('avatar');

        if($user->avatar !== null){
            Storage::disk('public')->delete($user->avatar);
        }

        $avatar = $request->file('avatar');
        $avatarPath = $avatar->store('avatars', 'public');
        $user->update(['avatar' => $avatarPath]);
        return response()->json(['path' => $avatarPath, 'success' => 'L\'avatar a bien été modifié !']);

    }
}
