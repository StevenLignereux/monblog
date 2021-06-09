<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'slug',
        'seo_title',
        'excerpt',
        'body',
        'meta_description',
        'meta_keywords',
        'active',
        'image',
        'user_id',
    ];

    /**
     * user relation
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * categories relation
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * tags relation
     *
     * @return void
     */
    public function tags()
    {
        return $this->BelongsToMany(Tag::class);
    }
}
