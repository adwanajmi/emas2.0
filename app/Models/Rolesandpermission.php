<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolesandpermission extends Model
{
    use HasFactory;

    protected $table = 'role_has_permissions';

    protected $primaryKey = 'id';
}
