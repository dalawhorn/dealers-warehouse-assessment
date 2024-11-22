<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'phone',
        'email',
        'business_type_id',
        'shipment_days'
    ];

    public function businessType() {
        return $this->hasOne(BusinessType::class);
    }

    protected function phone(): Attribute
    {
        return Attribute::make(
            // get: function(string $value){
            //     
            // },
            set: function(string $value){
                return str_replace([' ', '-', '(', ')'], '', $value);
            },
        );
    }

    protected function shipmentDays(): Attribute
    {
        return Attribute::make(
            get: function(string $value){
                return json_decode($value);
            },
            set: function(array $value){
                return json_encode($value);
            },
        );
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: function(string $value){
                return date('m/d/Y H:i:s', strtotime($value));
            },
        );
    }
}
