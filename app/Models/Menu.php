<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\Education\Course;


class ApMenu extends Model
{
    use HasFactory;
    protected $table = 'ap_menus';
    protected $guarded = [''];
}


