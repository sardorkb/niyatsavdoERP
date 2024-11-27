<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'agreement_number',
        'customer_id',
        'agreement_date',
        'duration_months',
        'end_date',
        'prepayment',
        'product_name',
        'product_quantity',
        'product_cost_price',
        'product_markup',
        'product_price',
        'notes',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($agreement) {
            $agreement->agreement_number = 'AGR-' . str_pad(
                Agreement::max('id') + 1,
                6,
                '0',
                STR_PAD_LEFT
            );
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
