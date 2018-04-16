<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Use_;

class Role extends Model
{
    protected $fillable = [
        'title', 'body'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
