<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Category extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use HasFactory;

    public $table = 'thruses';

    protected $guarded = [''];

    public function thrus()
    {
        return $this->hasMany(Thrus::class);
    }
}
