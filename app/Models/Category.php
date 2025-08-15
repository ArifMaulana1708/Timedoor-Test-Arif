<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = "category";
    protected $primaryKey = "id_category";
    public $timestamps = true;
    protected $fillable = ['', '', 'category_name'];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}