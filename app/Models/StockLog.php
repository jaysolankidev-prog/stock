<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'stock_id', 'bag_no', 'category', 'size', 'nwt', 'action', 'quantity_changed',
        'quantity_before', 'quantity_after', 'note', 'logged_at'
    ];

    protected $casts = [
        'logged_at' => 'datetime',
        'nwt' => 'decimal:2',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
