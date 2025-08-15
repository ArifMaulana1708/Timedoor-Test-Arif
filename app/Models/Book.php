<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "book";

    protected $primaryKey = "id_book";
    public $timestamps = true;
    protected $fillable = ['id_author', 'id_category', 'book_title'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'id_author', 'id_author');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'id_book', 'id_book');
    }
}