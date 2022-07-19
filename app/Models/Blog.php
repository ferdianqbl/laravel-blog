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

    public function scopeFilter($query, $req)
    {
        $query->when($req->category, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('category_slug', $category);
            });
        });

        $query->when($req->search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                ->orWhere('body', 'like', "%{$search}%");
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
