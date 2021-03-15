<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function invoicedetails(){
        return $this->hasMany(TailorIssue::class, 'issue_id', 'id');
      }
}
