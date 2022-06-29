<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    public $table = 'keys';

    protected $fillable = [

        'namaKey',
        'keteranganKey',
        'thrust_id',
        'user_id',
    ];

    protected $with = [
        'user',
        'thrust'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thrust()
    {
        return $this->belongsTo(Thrust::class, 'thrust_id');
    }
}