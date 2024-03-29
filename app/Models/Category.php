<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the subcategories for the category.
     */
    public function subcategories()
    {
        return $this->hasMany('App\Models\Subcategory');
    }

    /**
     * The issues that belong to the category.
     */
    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }
}
