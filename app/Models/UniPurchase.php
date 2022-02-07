<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniPurchase extends Model
{
    use HasFactory;
    protected $table = 'uni_purchase';
    protected $fillable = ['name','description','content','plan_date','price','price_sale','updated_at'];
}
