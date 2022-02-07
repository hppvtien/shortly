<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniGroupUser extends Model
{
    use HasFactory;
    protected $table = 'uni_groupuser';
    protected $fillable = ['name'];
}
