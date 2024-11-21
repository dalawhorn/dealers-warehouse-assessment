<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function businessType() {
        return $this->hasOne(BusinessType::class);
    }
}
