<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Tindakan extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'tindakans';

    protected $guarded = ['id'];


    // protected $fillable = [

    //     'keteranganTindakan',
    //     'namaTindakan',
    //     'user_id',
    //     'inisiatif_id',
    //     'perkara_id',
    //     'kementerian_penyelaras',
    //     'kementerian_pelaksana',
    //     'tempohSiap',
    //     'kategoriSasaran',
    //     'statusPelaksanaan',
    //     'catatan2022',
    //     'sasaran2022',
    //     'pencapaian2022',
    //     'catatan2021',
    //     'sasaran2021',
    //     'statusPelaksanaan2021'



    // ];

    // protected $with = [
    //     'user',
    //     'inisiatif',
    //     'perkara',

    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inisiatif()
    {
        return $this->belongsTo(Inisiatif::class, 'inisiatif_id');
    }

    public function strategi()
    {
        return $this->belongsTo(Strategi::class, 'strategi_id');
    }

    public function perkara()
    {
        return $this->belongsTo(Perkarautama::class, 'perkara_id');
    }

    public function outcome()
    {
        return $this->belongsTo(Outcome::class, 'outcome_id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function bab()
    {
        return $this->belongsTo(Bab::class, 'bab_id');
    }

    public function pemangkin()
    {
        return $this->belongsTo(Pemangkindasar::class, 'pemangkin_id');
    }
}
