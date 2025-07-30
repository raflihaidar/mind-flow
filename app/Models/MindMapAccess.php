<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MindMapAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'mind_map_id',
        'user_id',
        'role'
    ];
}
