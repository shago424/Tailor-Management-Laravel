<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    
      public function item(){
      	return $this->belongsTo(Item::class, 'item_id', 'id');
      }

      public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
      }


       public function invoice(){
        return $this->belongsTo(Invoice::class, 'id', 'invoice_id');
      }

       public function payment(){
        return $this->belongsTo(Payment::class, 'invoice_id', 'invoice_id');
      }



     
     
}
