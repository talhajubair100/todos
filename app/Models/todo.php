<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'image',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
