<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;

    const PAGINATION_COUNT = 10;
    
    protected $guarded = [];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
     * undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * undocumented function
     *
     * @return void
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
