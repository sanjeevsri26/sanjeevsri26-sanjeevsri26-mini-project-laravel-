<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class category extends Model
// {
//     use HasFactory;

//     protected $guarded = [];
//     protected $table = 'categories';
// }

class Category extends Model
{
    protected $fillable = ['categoryName', 'parent_id']; // Assuming these are your fillable fields

    // Define the parent relationship
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Define the children relationship (if you want to fetch subcategories)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}

