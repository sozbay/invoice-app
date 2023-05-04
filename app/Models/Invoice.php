<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public $table='invoice';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'invoice_number',
        'customer_id',
        'note',
        'payment_method_id',
        'due_date',
        'total_price'
    ];
    public function invoiceItems(){
        return $this->hasMany(InvoiceItems::class,'invoice_id','id');
    }
    public function customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}
