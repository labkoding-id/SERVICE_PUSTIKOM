<?php

namespace App\Models\pmb;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $primaryKey = 'id';
    protected $connection = 'PUSTIKOM_PMB';
    protected $table = 'biodata_calon_mahasiswa';
    protected $guarded = [];
}
