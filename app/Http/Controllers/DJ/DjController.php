<?php

namespace App\Http\Controllers\DJ;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DjController extends Controller
{
    //
    public function index(){
        return view('dj.index');
    }

    public function room($id){
        $data = [
            'client_id' => $id
        ];
        
        return view('dj.room', $data);
    }
}
