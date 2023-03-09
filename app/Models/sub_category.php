<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    protected $fillable = ['category_id','sub_name'];
   
}
