<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class Withdrawal extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'withdrawal';
    const STATUS_DEFAULT = 0;
    const STATUS_SUCCESS = 1;
    const STATUS_TRASH = 2;
    public $statusGlobal;
    protected $g_status = [
        self::STATUS_DEFAULT => [
            'name' => 'Gửi yêu cầu',
            'name_en' => 'Receive',
            'class' => 'badge-light-primary'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Hoàn thành',
            'name_en' => 'Complete',
            'class' => 'badge-light-success'
        ],
        self::STATUS_TRASH => [
            'name' => 'Đã hủy',
            'name_en' => 'Cancel',
            'class' => 'badge-light-danger'
        ],
    ];
    public static function getStatusGlobal()
    {
        $that = new self();
        return $that->g_status;
    }
    public function getStatus()
    {
        return Arr::get($this->g_status, $this->status, "[N\A]");
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
