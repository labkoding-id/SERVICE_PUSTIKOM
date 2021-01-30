<?php

namespace App\Models\pmb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Token extends Model
{
    use SoftDeletes;
    
    protected $connection = 'PUSTIKOM_PMB';
    protected $table = 'tokens';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    protected static function booted()
    {
        static::creating(function ($tokens) {
            $tokens->token           = self::generate_token();
            $tokens->password        = self::generate_password();
        });
    }

    protected static function generate_token() {
 
        $num_segments = 5;
        $segment_chars = 4;
        $tokens = '1234567890';
        $tokens_string = '';
    
        for ($i = 0; $i < $num_segments; $i++) {
            $segment = '';
            for ($j = 0; $j < $segment_chars; $j++) {
                $segment .= $tokens[rand(0, strlen($tokens)-1)];
            }
            $tokens_string .= $segment;
            if ($i < ($num_segments - 1)) {
                $tokens_string .= '-';
            }
        }
        
        if(isset($suffix)){
            if(is_numeric($suffix)) {  
                $tokens_string .= '-'.strtoupper(base_convert($suffix,10,36));
            }else{
                $long = sprintf("%u\n", ip2long($suffix),true);
                if($suffix === long2ip($long) ) {
                    $tokens_string .= '-'.strtoupper(base_convert($long,10,36));
                }else{
                    $tokens_string .= '-'.strtoupper(str_ireplace(' ','-',$suffix));
                }
            }
        }
        return $tokens_string;
    }

    protected static function generate_password(){
        $random     = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
        $password   = substr($random, 0, 8);
        return $password;
    }

    public function maba(){
        return $this->hasOne(CalonMahasiswa::class, 'token_id');
    }
}
