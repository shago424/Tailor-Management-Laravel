<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class TailorPayment extends Model
{
     public function tailor(){
        return $this->belongsTo(Tailor::class, 'tailor_id', 'id');
      }

      public function user(){
      	return $this->belongsTo(User::class, 'created_by', 'id');
      }
}
