<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class HomeController extends Controller
{
    
    public function index() {
    	return view('home');
    }

    public function shorten(Request $request) {
    	
    	//validate url here
    	$regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'; //regex for validating url
    	$request->validate([
    		'url'=>'required|regex:' . $regex.'|max:255'
    	]);
    	$data=Link::checkExist($request->url);
    	$success ='This is a shorten URL Click to redirect <b><a href="'.url($data->code).'">'.url($data->code).'</a></b>';    

    	return redirect('/')->withSuccess($success);
    }

    public function redirect($code) {
    	$checkCode=Link::checkCode($code);
    	if ($checkCode->count() > 0) {
    		//return to external url
    		return redirect()->to($checkCode->first()->url);
    	}
    	$info='Code <b>'.$code.'</b> Not Exist';
    	return redirect('/')->withInfo($info);
    }
}
