<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\CapitalizeCast;
class Category extends Model
{
    use HasFactory;
    protected $casts=[
    'category_name' => CapitalizeCast::class, 
     ];
    protected $fillable=['category_name','category_image'];
}
