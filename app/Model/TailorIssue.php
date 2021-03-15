<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class TailorIssue extends Model
{
   
public function user(){
      	return $this->belongsTo(User::class, 'created_by', 'id');
      }
       public function item(){
      	return $this->belongsTo(Item::class, 'item_id', 'id');
      }

      public function tailor(){
      	return $this->belongsTo(Tailor::class, 'tailor_id', 'id');
      }

         public function invoice(){
        return $this->belongsTo(Issue::class, 'issue_id', 'id');
      }
}
