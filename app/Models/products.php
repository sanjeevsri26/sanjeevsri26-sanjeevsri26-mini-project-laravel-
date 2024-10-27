<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];


    // Define the $fillable array to specify which attributes can be mass assigned
    protected $fillable = [
        'ProductsTitle',
        'ProductsContent',
        'ProductsImage',
    ];

    public function addcart()
    {
        return $this->hasMany(addcart::class);
    }

}