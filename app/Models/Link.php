<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $guarded=[];

    public static function checkExist($url) {
    	$check=self::where('url',$url);
    	if ($check->count() > 0) {
    		$data=$check->first();
    	} else {
    		$create=self::create([
    			'url'=>$url
    		]);

	    	if ($create) {
	    		$code=self::random();
	    		$data=self::where('id',$create->id)->update(['code'=>$code]);
	    	}	
    	}
    	return $data;
    }

    public static function checkCode($code) {
    	return self::where('code',$code);    
    }


    public static function random($length = 10)
	{
	    if ( ! function_exists('openssl_random_pseudo_bytes'))
	    {
	        throw new RuntimeException('OpenSSL extension is required.');
	    }

	    $bytes = openssl_random_pseudo_bytes($length * 2);

	    if ($bytes === false)
	    {
	        throw new RuntimeException('Unable to generate random string.');
	    }

	    return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
	}

}
