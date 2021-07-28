<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'text',
        'img_name',
        'slug',

    ];
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:m',

    ];
    protected $dates = [
        'created_at',
    ];

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }

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
