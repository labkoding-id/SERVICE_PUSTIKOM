<?php

namespace App\Models\pmb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Biodata extends Model
{
   
    protected $connection = 'PUSTIKOM_PMB';
    protected $table = 'biodata_calon_mahasiswa';
    protected $guarded = [];

    public function maba()
    {
        return $this->hasOne(CalonMahasiswa::class, 'biodata_id');
    }

    protected static function booted ()
    {
        static::creating(function ($biodata) {
      
            $biodata->no_registrasi  = self::generate_registrasi_number();
        });
    }


    public static function generate_registrasi_number()
    {
        $dateCode = 'PMB' . '/' . date('Ymd') . '/' . self::integerToRoman(date('m')) . '/' . self::integerToRoman(date('d')) . '/';

        $lastOrder = self::select([DB::connection('PUSTIKOM_PMB')->raw('MAX(biodata_calon_mahasiswa.no_registrasi) AS last_code')])
            ->where('no_registrasi', 'like', $dateCode . '%')
            ->first();

        $lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;

        $orderCode = $dateCode . '00001';
        if ($lastOrderCode) {
            $lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
            $nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);

            $newCode = $dateCode . $nextOrderNumber;
        }

        if (self::_isOrderCodeExists($orderCode)) {
            return $newCode;
        }

        return $orderCode;
    }

    private static function _isOrderCodeExists($orderCode)
    {
        return self::where('no_registrasi', '=', $orderCode)->exists();
    }

    public static function integerToRoman($integer)
    {
        $integer = intval($integer);
        $result = '';

        // Create a lookup array that contains all of the Roman numerals.
        $lookup = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];

        foreach ($lookup as $roman => $value) {
            $matches = intval($integer / $value);
            $result .= str_repeat($roman, $matches);
            $integer = $integer % $value;
        }

        return $result;
    }
}
