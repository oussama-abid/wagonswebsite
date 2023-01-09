<?php

namespace App\Http\Controllers;

use App\Models\Zug;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ZugController extends Controller
{
    public function deleteone(int $zug){

        $wagonsid=DB::table('relations')->where('zug_id', $zug)->pluck('wagon_id');
        DB::table('relations')->where('zug_id', $zug)->delete();
       for($i=0;$i<count($wagonsid);$i++){
        DB::table('wagons')->where('id', $wagonsid[$i])->delete();
       }
       DB::table('zugs')->where('id', $zug)->delete();
       return back();    
    }
    public function show (){
        $data = Zug::all();
        return view('welcome',['zugs'=>$data]);
    }
    public function store(Request $request)
    {
        $zug = new Zug;
        $zug->name = $request['name'];
        $zug->nachname = $request['nachname'];
        $zug->versandbanhof = $request['versandbanhof'];
        $zug->bestimmungsbanhof = $request['bestimmungsbanhof'];
        $zug->datum = $request['datum'];
        $zug->ref = $request['ref'];
        $zug->zugnummer = $request['zugnummer'];
        $zug->Mindestbremshunderstel = $request['Mindestbremshunderstel'];  
        $zug->save();
    }
    public function create(Zug $zug)
    {
        
        return view('add',['zug'=>$zug]);

    }
}
