<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'slug',
        'image',
        'review',
        'editor_rating',
        'genre',
];
    protected $table = 'books';

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
