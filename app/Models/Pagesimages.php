<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagesimages extends Model
{
    use HasFactory;
    protected $fillable = [
        'pagename',
        'image'
    ];
}
