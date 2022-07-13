<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdg extends Model
{
    use HasFactory;

    public $table = 'sdgs';

    protected $guarded = ['id'];

    // protected $fillable = [

    //     'keteranganSdg',
    //     'namaSdg',
    //     'pemangkin_id',
    //     'user_id',
    // ];

    // protected $with = [
    //     'user',
    //     'pemangkin'

    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pemangkin()
    {
        return $this->belongsTo(Pemangkindasar::class, 'pemangkin_id');
    }
}
