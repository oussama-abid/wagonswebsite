<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Wagon;
use App\Models\relation;
use App\Models\Zug;

class WagonController extends Controller
{

  public function index(  )
    {
      $list = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
      ->join('zugs', 'zugs.id', '=', 'relations.zug_id')->get();
    //  var_dump(compact('list'));
      return view('List',compact('list'));
    }
    public function show( int $zug  )
    {
     $zugs =DB::table('zugs')
      ->where('id',$zug)
      ->get();
      
      $wagons = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
        ->join('zugs', 'zugs.id', '=', 'relations.zug_id')
        ->where('zugs.id',$zug)
        ->get();
      return view('/list2', ['zug' => $zugs],['wagon' => $wagons]);   
    }
  
    public function wagonszug(){

    }
    public function store ($zug){
      
      $wagon = new Wagon;
      $wagon->wagennummer = request('wagennummer');
      $wagon->gattungsbuchstabe = request('gattungsbuchstabe');
      $wagon->längeüberpuffer = request('längeüberpuffer');
      $wagon->eigenmasse = request('eigenmasse');
      $wagon->AnzahlderAcshen = request('AnzahlderAcshen');
      $wagon->GewichtderLadung = request('GewichtderLadung');
      $wagon->Bremsgewicht = request('Bremsgewicht');
      $wagon->lastwechselundbremsgewicht = request('lastwechselundbremsgewicht');
      $wagon->bremsstellung = request('bremsstellung');
      $wagon->hinweisezureibungsbremse = request('hinweisezureibungsbremse');
      $wagon->bemerkungenzurfeststellbremse = request('bemerkungenzurfeststellbremse');
      $wagon->bemerkung = request('bemerkung');
      $wagon->Schadwagen = request('Schadwagen');
      $wagon->Beladenmitgefahrgut = request('Beladenmitgefahrgut');
      $wagon->UNNummer = request('UNNummer');
      $wagon->versandbanhof = request('zugversandbanhof');
      $wagon->bestimmungsbanhof = request('zugbestimmungsbanhof');
      $wagon->datum = request('zugdatum');
      $wagon->save();
      relation::create([
          'zug_id' => request('zugid'),
          'wagon_id' => $wagon->id
      ]);
      
        return redirect()->route('wagons.show',$zug);
     
       
     
      
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
      
        $wagon = Wagon::find($id);
        // Getting values from the blade template form
        $wagon->wagennummer = $request->get('wagennummer');
        $wagon->gattungsbuchstabe = $request->get('gattungsbuchstabe');
        $wagon->längeüberpuffer = $request->get('längeüberpuffer');
        $wagon->eigenmasse = $request->get('eigenmasse');
        $wagon->AnzahlderAcshen = $request->get('AnzahlderAcshen');
        $wagon->GewichtderLadung = $request->get('GewichtderLadung');
        $wagon->Bremsgewicht = $request->get('Bremsgewicht');
        $wagon->lastwechselundbremsgewicht = $request->get('lastwechselundbremsgewicht');
        $wagon->bremsstellung = $request->get('bremsstellung');
        $wagon->hinweisezureibungsbremse = $request->get('hinweisezureibungsbremse');
        $wagon->bemerkungenzurfeststellbremse = $request->get('bemerkungenzurfeststellbremse');
        $wagon->bemerkung = $request->get('bemerkung');
        $wagon->Schadwagen = $request->get('Schadwagen');
        $wagon->Beladenmitgefahrgut = $request->get('Beladenmitgefahrgut');
        $wagon->UNNummer = $request->get('UNNummer');
        $wagon->versandbanhof = $request->get('zugversandbanhof');
        $wagon->bestimmungsbanhof = $request->get('zugbestimmungsbanhof');
        $wagon->datum = $request->get('zugdatum');
        $wagon->save();
 
        $list = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
      ->join('zugs', 'zugs.id', '=', 'relations.zug_id')->get();
    //  var_dump(compact('list'));
      return view('List',compact('list'));
    }
    public function show1(Request $request)
    {
      $wagon =Wagon::
      where('id',$request->id)
      ->get();
      return view('edit',compact('wagon'));

    }
}
