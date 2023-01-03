<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Wagon;
use App\Models\relation;
use App\Models\Zug;
use Barryvdh\DomPDF\Facade\Pdf;
class WagonController extends Controller
{
public function pdf(int $zug){
  $zugs =DB::table('zugs')
      ->where('id',$zug)
      ->get();
      
      $wagons = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
        ->join('zugs', 'zugs.id', '=', 'relations.zug_id')
        ->where('zugs.id',$zug)
        ->get();
      
  $pdf = Pdf::loadView('pdf',['zug' => $zugs],['wagon' => $wagons]);
  return $pdf->stream('wagonslist.pdf');
}
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
      if(request('lastwechselundbremsgewicht') == "Leer"){
        $wagon->b = request('AnzahlderAcshen');
      }
      if(request('lastwechselundbremsgewicht') != "Leer"){
        $wagon->a= request('AnzahlderAcshen');
      }
      if(request('bremsstellung') == "P"){
        $wagon->d = request('Bremsgewicht');
      }
      if(request('bremsstellung') == "G"){
        $wagon->e = request('Bremsgewicht');
      }
      if(request('hinweisezureibungsbremse') == "K"){
        $wagon->k = "X";
      }
      if(request('hinweisezureibungsbremse') == "L" || request('hinweisezureibungsbremse') == "LL"){
        $wagon->l = "X";
      }
      if(request('hinweisezureibungsbremse') == "D" ){
        $wagon->sh = "X";
      }
      if(request('bemerkungenzurfeststellbremse') == "bühnenbedienbar" || request('bemerkungenzurfeststellbremse') == "bodenbedienbar" ){
        $wagon->h = "X";
      }
      if(request('UNNummer') == ""){
        $wagon->bm = request('Schadwagen');
      }
      if(request('UNNummer') != ""){
        $wagon->bm = request('UNNummer');
      }
       
      $wagon->fir = substr($wagon->wagennummer, 0, 2);
      $wagon->sec = substr($wagon->wagennummer, 2, 2);
      $wagon->thir = substr($wagon->wagennummer, 4, 4);
      $theRest = substr($wagon->wagennummer,8);
      $wagon->four = substr($theRest, 0,3);
      $wagon->five = substr($theRest, 3,3);
      
      $wagon->ge = (int) $wagon->eigenmasse + (int)$wagon->GewichtderLadung;
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
        public function search(Request $request){
       

          $list = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
          ->join('zugs', 'zugs.id', '=', 'relations.zug_id')->get();


          if ($request->one != "") {
            for ($i=0; $i <count($list) ; $i++) { 
if ($list[$i]->zugnummer != $request->one) {
unset($list[$i]);

}}}

if ($request->tow != "") {
  for ($i=0; $i <count($list) ; $i++) { 
if ($list[$i]->datum != $request->one) {
unset($list[$i]);

}}}
if ($request->three != "") {
  for ($i=0; $i <count($list) ; $i++) { 
if ($list[$i]->versandbanhof != $request->one) {
unset($list[$i]);

}}}
if ($request->four != "") {
  for ($i=0; $i <count($list) ; $i++) { 
if ($list[$i]->bestimmungsbanhof != $request->one) {
unset($list[$i]);

}}}
       if ($request->five != "") {
            for ($i=0; $i <count($list) ; $i++) { 
if ($list[$i]->ref != $request->one) {
unset($list[$i]);

}}}


            
        
          
       
          return view('List',compact('list'));
        }







}
