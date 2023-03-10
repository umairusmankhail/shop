<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function category()
    {
        return $this->hasmany(sub_category::class);
    }
    public function subcategories()
    {
        return $this->hasMany(sub_category::class);
    }
    protected $fillable=['cat_name'];
    use HasFactory;
}
