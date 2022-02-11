<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\CapitalizeCast;
class Modal extends Model
{
    use HasFactory;
    protected $casts=[
    'video_name' => CapitalizeCast::class, 
     ];
    protected $fillable=[
       
        'video_name',
        'video',
        'audio',
        'premium',
        'category_id',
        'color',
        'approve'
    ];
}
