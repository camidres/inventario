<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;

    protected $fillable = [

        'id', 'content', 'total', 'created_at', 'updated_at'

    ];

}
