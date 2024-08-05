<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    // The elements that cannot be mass-assigned. Other elements
    // than the ones below can be mass-assigned.
    //protected $guarded = ['id'];
    // 'id' is now guarded. Meaning that we can mass-assign it 
    // but our mass-assignment won't matter.

    // $fillable determines which attributes can be mass assigned
    // using Post::create( [ 'fillable1' => .., 'fillable2' => .., ...])
    //protected $fillable = [ 'title', 'excerpt', 'body', 'id'];

    // Every column-variable can be mass assigned, when guarded
    // is an empty array 
    protected $guarded = [];
}
