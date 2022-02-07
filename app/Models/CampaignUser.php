<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignUser extends Model
{
    use HasFactory;
    protected $table = 'uni_user_campaign';
    // protected $fillable = ['title','content','status'];
}
