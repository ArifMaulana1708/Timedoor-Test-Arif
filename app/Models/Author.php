<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = "author";
    protected $primaryKey = "id_author";
    public $timestamps = true;
    protected $fillable = ['author_name'];

    // public function books()
    // {
    //     return $this->hasMany(Book::class);
    // }
    public function books()
    {
        return $this->hasMany(Book::class, 'id_author', 'id_author');
    }
}