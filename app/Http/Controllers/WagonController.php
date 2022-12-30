<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wagon;


class WagonController extends Controller
{
    public function list()
    {

        $list = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
        ->join('zugs', 'zugs.id', '=', 'relations.zug_id')->get();
      //  var_dump(compact('list'));
        return view('List',compact('list'));
    }
}
