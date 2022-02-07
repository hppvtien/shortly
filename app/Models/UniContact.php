<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniContact extends Model
{
    use HasFactory;
    protected $table = 'uni_contact';
    protected $fillable = ['purchase_id','admin_id','updated_at','status'];
}
