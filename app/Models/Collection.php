<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'description',
        'code',
        'allowed_type',
    ];

    public function allowedUsers(){
        $this->belongsToMany(
            related: User::class,
            table: 'allowed_users',
        );
    }
}
