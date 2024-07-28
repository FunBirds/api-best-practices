<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function article(): void
    {
        $this->hasMany(Article::class, 'category_id', 'id');
    }
}
