<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniCatCampaign extends Model
{
    use HasFactory;
    protected $table = 'uni_catcampaign';
    protected $fillable = ['name'];
}
