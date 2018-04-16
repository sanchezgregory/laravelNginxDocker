<?php

namespace App;

use File;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'profile', 'avatar', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOnlyNameFile(string $namefile)
    {
        $name = explode(".",$namefile);

        return $name[0];
    }

    public function deleteAvatarIfExist($name)
    {
        $exts = [
            0 => 'jpeg',
            1 => 'jpg',
            2 => 'png'
        ];

        foreach ($exts as $ext) {

            $file = 'storage/avatars/' . $name . "." . $ext;

            if (File::exists(public_path($file))) {

               \File::delete($file);
                return true;
            }
        }

        return false;

    }
}
