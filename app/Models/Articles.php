<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'user_id', 'title', 'content', 'image', 'created_at', 'updated_at'];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
}
