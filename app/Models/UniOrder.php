<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\Supplier\Supplier;
class UniOrder extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'uni_order';
    const STATUS_DEFAULT = 0;
    const STATUS_SUCCESS = 1;
    const STATUS_TRASH = 2;
    public $statusGlobal;
    protected $g_status = [
        self::STATUS_DEFAULT => [
            'name' => 'Tiếp nhận',
            'name_en' => 'Receive',
            'class' => 'badge-primary'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Hoàn thành',
            'name_en' => 'Complete',
            'class' => 'badge-success'
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
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
