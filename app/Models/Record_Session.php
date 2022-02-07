<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record_Session extends Model
{
    use HasFactory;
    protected $table = 'record_session';
    protected $guarded = [];
    // protected $fillable = ['pagely_view'];
}
