<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Perkarautama extends Model implements Auditable
{
    
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'perkarautamas';

    // protected $fillable = [

    //     'keteranganPerkaraUtama',
    //     'namaPerkara',
    //     'fokus_id',
    //     'user_id',
    // ];

    protected $guarded = ['id'];

    protected $with = [
        'user',
        'fokus',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fokus()
    {
        return $this->belongsTo(Fokusutama::class, 'fokus_id');
    }
}
