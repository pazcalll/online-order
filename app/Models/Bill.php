<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['note', 'min_price', 'percentage_discount', 'max_amount_discount', 'shipping_cost', 'deleted_at'];

    public function bill_detail()
    {
        return $this->hasMany(BillDetail::class, 'bill_id');
    }
}