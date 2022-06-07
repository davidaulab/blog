<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    use HasFactory;

/**
 * The attributes that aren't mass assignable.
 *
 * @var array
 */
protected $guarded = [];

protected $table = 'articles';

protected $fillable = ['title', 'text', 'img'];

}
