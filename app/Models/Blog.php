<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'author',
    //     'excerpt',
    //     'body',
    // ];

    protected $guarded = ['id'], $with = ['author', 'category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
