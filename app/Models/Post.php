<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Casts\PurifyHtmlOnGet;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content'
    ];


    protected $casts = [
        'content' => PurifyHtmlOnGet::class,
    ];
}