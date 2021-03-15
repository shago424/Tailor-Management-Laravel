<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tailor extends Model
{
    public function item(){
        return $this->belongsTo(Item::class, 'item_id', 'id');
      }

      public function issue(){
        return $this->belongsTo(TailorIssue::class, 'tailor_id', 'id');
      }
}
