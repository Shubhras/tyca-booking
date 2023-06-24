<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class ServiceDiscountRates extends Model
{
    use HasFactory;
    protected $table = 'service_discount_rates';
    protected $fillable = ['above_count', 'rate', 'discount_type', 'service_id'];

    public function services(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Service::class, 'service_id');
    }
}
