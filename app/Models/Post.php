<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * 
     * @var array<int, string>
     */

    protected $fillable = [
        'subject',
        'post',
        'status',
    ];
}