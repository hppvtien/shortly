<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniCampaign extends Model
{
    use HasFactory;
    protected $table = 'uni_campaign';
    protected $fillable = ['title','content','status','start_date','finish_date','updated_at','number_click','cost_click','catCampaign_id','user_group'];
}
