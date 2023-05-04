<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItems extends Model
{
    use HasFactory;
    public $table='invoice_items';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'invoice_id',
        'product_code',
        'product_name',
        'unit',
        'unit_amount',
        'qty',
        'unit_price',
        'tax',
        'discount',
        'description'
    ];
}
