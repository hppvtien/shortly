<?php

namespace App\Models;

use App\Models\Education\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackUpView extends Model
{
    use HasFactory;
    protected $table = 'backupview';
    protected $guarded = [''];
}
