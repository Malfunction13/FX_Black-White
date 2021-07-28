<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function getCreatedAtAttribute($value)
    {
        if ($value !== null){
            return Carbon::parse($value)->format('d-m-Y H:m');
        } else {
            return null;
        }
    }

    public function getUpdatedAtAttribute($value)
    {
        if ($value !== null){
            return Carbon::parse($value)->format('d-m-Y H:m');
        } else {
            return null;
        }
    }

}
