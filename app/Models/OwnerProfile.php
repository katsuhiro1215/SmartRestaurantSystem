<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class OwnerProfile extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
