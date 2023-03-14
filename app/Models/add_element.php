<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_element extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','label','value'];
}
