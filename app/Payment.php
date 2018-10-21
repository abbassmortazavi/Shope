<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function scopePay($query , $month , $payment)
    {
        $query->selectRaw('monthname(created_at) month , count(*) published')
            ->where('created_at' , '>' , Carbon::now()->subMonth($month))
            ->wherePayment($payment)
            ->groupBy('month')
            ->orderByRaw('max(created_at)desc');
    }
}
