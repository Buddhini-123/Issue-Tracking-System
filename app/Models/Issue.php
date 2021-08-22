<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $table = 'issues';
    protected $fillable = [
        'title',
        'body',
        'uuid',
        'slug',
    ];

    /**
     * Get the comments for the issue.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Get the images for the Issue.
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
    /**
     * Get the issues for the Category.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
