<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'posts';
    protected $fillable = [
        'title','permission','post',
    ];
}
