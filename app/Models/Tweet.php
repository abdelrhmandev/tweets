<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'body',
    ];

    public function user(){
        return $this->BelongsTo(User::class);
    }

}
