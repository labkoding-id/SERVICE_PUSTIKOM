<?php

namespace App\Models\pmb;

use Illuminate\Database\Eloquent\Model;

class CalonMahasiswa extends Model
{
    protected $primaryKey = 'id';
    protected $connection = 'PUSTIKOM_PMB';
    protected $table = 'calon_mahasiswa';
    protected $guarded = [];
}
