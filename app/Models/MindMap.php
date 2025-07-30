<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class MindMap extends Model
{
    use HasFactory;

    protected $table = 'mind_map';
    protected $connection = 'mongodb';
    protected $fillable = ['title', 'creator', 'nodes'];
}
