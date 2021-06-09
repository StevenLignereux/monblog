<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['tag'];

    public $timestamps = false;

    /**
     * posts relation
     *
     * @return void
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
