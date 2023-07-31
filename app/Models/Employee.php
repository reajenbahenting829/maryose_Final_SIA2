<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'age',
        'address',
        'job',
        'year',
    ];

    // public function account()
    // {
    //     return $this->belongsTo('App\Models\Employee',);
    // }
    public function account()
    {
        return $this->belongsTo(Account::class, 'user_id', 'user_id');
    }
}
