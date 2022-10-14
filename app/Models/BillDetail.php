<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetail extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['bill_id', 'person', 'food', 'price', 'number'];

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }

    // public function person()
    // {
    //     return $this->belongsTo();
    // }
}