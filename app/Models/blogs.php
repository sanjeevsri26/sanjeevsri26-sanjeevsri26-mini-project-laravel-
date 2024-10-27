<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model
{
    use HasFactory;
    use SoftDeletes;

    // No need to specify guarded if you're using fillable
    protected $fillable = [
        'blogstitle',
        'blogsContent',
        'blogsimage',
    ];
}
