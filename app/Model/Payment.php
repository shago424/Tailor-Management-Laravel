<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function customer(){
      	return $this->belongsTo(Customer::class, 'customer_id', 'id');
      }

      public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
      }

       public function invoicecustomer(){
        return $this->belongsTo(Invoice::class, 'custome_id', 'id');
      }

     public function invoicedetail(){
        return $this->belongsTo(InvoiceDetail::class, 'invoice_id', 'customer_id');
      }

      public function paymentdetails(){
        return $this->belongsTo(PaymentDetail::class, 'invoice_id', 'id');
      }



      public function item(){
      	return $this->belongsTo(Item::class, 'item_id', 'id');
      }

      public function subcategory(){
      	return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
      }

      public function subsubcategory(){
        return $this->belongsTo(SubSubCategory::class, 'sub_sub_category_id', 'id');
      }

      public function brand(){
      	return $this->belongsTo(Brand::class, 'brand_id', 'id');
      }

       public function unit(){
      	return $this->belongsTo(Unit::class, 'unit_id', 'id');
      }

       public function supplier(){
      	return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
      }

      public function product(){
      	return $this->belongsTo(Product::class, 'product_id', 'id');
      }

       public function model(){
        return $this->belongsTo(Product::class, 'model', 'id');
      }

      public function size(){
        return $this->belongsTo(Product::class, 'size', 'id');
      }
}
