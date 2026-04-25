<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'bag_no', 'size', 'nwt', 'quantity',
        'category', 'extra_type', 'extra_ply', 'extra_mm'
    ];

    public function logs()
    {
        return $this->hasMany(StockLog::class)->orderByDesc('logged_at');
    }
}
