<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'link',
        'image',
        'description',
        'position',
        'prioty'
    ];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    // bien query lay du lieu co gia tri position la $posi
    public function scopeGetBanner($query, $posi = 'top-banner') {
        $query = $query->where('position', $posi)->where('status', 1);
        return $query;
    }
}
