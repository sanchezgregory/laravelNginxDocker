<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request, User $user)
    {
        //Storage::disk('local')->put($nombrefile,  File::get($image));

        $profile = Profile::findOrFail($user->profile->id);

        $request->validate([
            'profile' => 'required|min:3|max:249',
            'image' => [
                'sometimes',
                'image',
                Rule::dimensions()->maxHeight(800)->maxHeight(800),
            ]
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            // $nombrefile = $image->getClientOriginalName(); // obtiene el nombre de la imagen

            //$imageName = time() .  $nombrefile;

            $ext = $request->image->getClientOriginalExtension();
            $imageName = $user->id . "-" . $user->profile->id;

            $name = $profile->getOnlyNameFile($image->getClientOriginalName());
            $existe = $profile->deleteAvatarIfExist($imageName);

            $imageName = $imageName . "." . $ext;

            // request()->image->move(public_path('images'), $imageName);
            // $profile->avatar = $request->file('image')->store('avatars', $imageName); // *** Si en config/filesystem.php no se establece por default el disco local

            $profile->avatar = $request->file('image')->storeAs('avatars', $imageName, 'public'); // *** Si sigue local por defecto, asi podemos usar otro

            $profile->update([
                'profile' => $request->profile,
                'avatar' => 'avatars/'.$imageName
            ]);

        // si no incopora imagen, solo de actualiza el perfil
        } else {

            $profile->profile = $request->profile;

            $profile->save();
        }

        return redirect()->back()->with('alert', 'Perfil almacenado');
    }

    public function get(User $user)
    {
        return Storage::response("avatars/$user->profile->avatar");
    }

    public function delete(User $user)
    {
        if ($user->profile->avatar == 'avatars/default.png') {
            return abort(401);
        }

        Storage::delete($user->profile->avatar);

        $profile = Profile::findOrFail($user->profile->id);

        $profile->update([
            'avatar' => 'avatars/default.png'
        ]);

        return back()->with('alert', 'Avatar eliminado');
    }
}
