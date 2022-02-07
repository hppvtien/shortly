<?php

namespace App\Models;

use App\Models\Education\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class AdminCampaign extends Model
{
    use HasFactory,HasApiTokens;
    protected $table = 'admin_campaign';
    protected $guarded = [];
    public $timestamps = false;
}
