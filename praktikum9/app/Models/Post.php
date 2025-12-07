<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Kolom-kolom yang boleh diisi secara mass assignment
    protected $fillable = ['title', 'author', 'article', 'image'];
}