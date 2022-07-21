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
        $query->when($req->search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('body', 'like', "%$search%");
            });
        });

        $query->when($req->category, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('category_slug', $category);
            });
        });

        $query->when($req->author, function ($query, $author) {
            return $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
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

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
