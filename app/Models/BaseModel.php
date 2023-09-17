<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getFullNameAttribute()
    {
        return $this->lastname . ' ' . $this->firstname;
    }

    public function getFullNameKanaAttribute()
    {
        return $this->lastname_kana . ' ' . $this->firstname_kana;
    }

    public function getFullAddressAttribute()
    {
        return $this->address1 . ' ' . $this->address2 . ' ' . $this->address3 . ' ' . $this->address4;
    }
}
