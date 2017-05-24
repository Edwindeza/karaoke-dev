<?php

namespace App\Http\Controllers\TV;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TvController extends Controller
{
    //
    public function master($id){
        $data = [
            'id'    	=> $id
        ];

        return view('tv.master', $data);
    }

    public function slave($id){
        $data = [
            'id'    	=> $id
        ];

        return view('tv.slave', $data);
    }

    public function config(Request $request){
        
    }
}
