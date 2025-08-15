<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\RatingFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = "rating";
    protected $primaryKey = "id_rating";
    public $timestamps = true;
    protected $fillable = ['id_book', '', 'rating_score'];
    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id_book');
    }
}