<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name',
    ];
    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class);
    }
}
