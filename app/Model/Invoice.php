<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function payment(){
      	return $this->belongsTo(Payment::class, 'id', 'invoice_id');
      }

     public function paymentdetails(){
        return $this->belongsTo(PaymentDetail::class, 'id', 'invoice_id');
      }

      public function invoicedetails(){
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
      }

       public function item(){
      	return $this->belongsTo(Item::class, 'item_id', 'id');
      }

}
