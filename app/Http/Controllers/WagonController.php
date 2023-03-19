<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Wagon;
use App\Models\relation;
use App\Models\Zug;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class WagonController extends Controller
{
  public function deleteone(int $wagon)
  {
    $wagon = Wagon::find($wagon);
  
   
    $wagon->arch = 1;
    $wagon->save();
    return back();
  }
  public function deleteonearch(int $wagon)
  {
    $x=DB::table('wagons')->where('id', $wagon)->pluck("id");
    DB::table('relations')->where('wagon_id',$x)->delete();
    DB::table('wagons')->where('id', $wagon)->delete();

    
    return back();
  }
  public function deleteall(int $zug)
  {
    $wagonsid = DB::table('relations')->where('zug_id', $zug)->pluck('wagon_id');
    for ($i = 0; $i < count($wagonsid); $i++) {
      DB::table('wagons')->where('id', $wagonsid[$i])->update(['arch' => 1]);
    }
    return back();
  }
  public function pdf(int $zug)
  {
    $zugs = DB::table('zugs')
      ->where('id', $zug)
      ->get();

    $wagons = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
      ->join('zugs', 'zugs.id', '=', 'relations.zug_id')
      ->where('zugs.id', $zug)
      ->where('wagons.arch', 0)
      ->get();

      $zg= $zugs->first()->zugnummer;
      $vb = $zugs->first()->versandbanhof;
      $bb = $zugs->first()->bestimmungsbanhof;
      $dt = $zugs->first()->datum;

$filename = 'wali_' . $zg . '_' . $vb . '-' . $bb .'_' .$dt . '.pdf';
    //print value
    //$user_role['role_id'];

    return Pdf::loadView('pdf', ['zug' => $zugs], ['wagon' => $wagons])->setPaper('a4')
      ->setOption('zoom', '200')
     ->download($filename);
  }
  public function index()
  {
    $list = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
      ->join('zugs', 'zugs.id', '=', 'relations.zug_id')->get();
    //  var_dump(compact('list'));
    return view('List', compact('list'));
  }
  public function show(int $zug)
  {
    $zugs = DB::table('zugs')
      ->where('id', $zug)
      ->get();
      $user = Auth::user();
      $bossid = $zugs->first()->bossid;

    $wagons = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
      ->join('zugs', 'zugs.id', '=', 'relations.zug_id')
      ->where('zugs.id', $zug)
      ->where('wagons.arch', 0)
      ->get();
      if($user->type == "boss"){
          
        if( $bossid  == $user->id){
          
          return view('/list2', ['zug' => $zugs], ['wagon' => $wagons]);
        }
        else{
          return redirect()->back();
        }
      }
      if($user->type == "admin"){
        return view('/list2', ['zug' => $zugs], ['wagon' => $wagons]);
      }
      else{
        if( $bossid  == $user->userboss){
          
    $wagons = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
    ->join('zugs', 'zugs.id', '=', 'relations.zug_id')
    ->where('zugs.id', $zug)
    ->where('wagons.arch', 0)
    ->where('wagons.iduser',$user->id)
    ->get();
          return view('/list2', ['zug' => $zugs], ['wagon' => $wagons]);
        }
        else{
          return redirect()->back();
        }
      }

    
  }

  public function wagonszug()
  {
  }
  public function store($zug, Request $request)
  {
    $zugdata = Zug::where('id', $zug)
        ->get();
    if (Wagon::where('arch', 1)->where('wagennummer', request('wagennummer'))->where('zugid',request('zugid'))->exists()) {
      $wg=DB::table('wagons')->where('wagennummer', request('wagennummer'))->where('zugid',request('zugid'))->pluck("id");
      DB::table('relations')->where('wagon_id',$wg)->delete();
      DB::table('wagons')->where('id', $wg)->delete();

        $this->validate(
          $request,
          [
  
            'wagennummer' => 'required|unique:wagons,wagennummer,NULL,id,zugid,'.request('zugid')
  
          ],
          [
            'wagennummer.unique' => 'Die Wagennummer ist bereits vergeben!',
  
          ]
        );
        $x=$request->wagennummer;
    
      
    } else {
      $this->validate(
        $request,
        [

          'wagennummer' => 'required|unique:wagons,wagennummer,NULL,id,zugid,'.request('zugid')

        ],
        [
          'wagennummer.unique' => 'Die Wagennummer ist bereits vergeben!',

        ]
      );
      $x=$request->wagennummer;
    }

      $wagon = new Wagon;
      $wagon->wagennummer = $x;
      $wagon->zugid = request('zugid');
      $wagon->gattungsbuchstabe = request('gattungsbuchstabe');
      $wagon->längeüberpuffer = request('längeüberpuffer');
      $wagon->eigenmasse = request('eigenmasse');
      $wagon->arch = request('arch');
      $wagon->AnzahlderAcshen = request('AnzahlderAcshen');
      $wagon->GewichtderLadung = request('GewichtderLadung');
      $wagon->Bremsgewicht = request('Bremsgewicht');
      $wagon->lastwechselundbremsgewicht = request('lastwechselundbremsgewicht');
      $wagon->bremsstellung = request('bremsstellung');
      $wagon->hinweisezureibungsbremse = request('hinweisezureibungsbremse');
      $wagon->bemerkungenzurfeststellbremse = request('bemerkungenzurfeststellbremse');

      $wagon->bemerkung = request('lademaßüberschreitung') . "," . request('außergewöhnlichesendung') . ","  . request('windgefährdeteladung');
      $wagon->Schadwagen = request('Schadwagen');
      $wagon->Beladenmitgefahrgut = request('Beladenmitgefahrgut');
      $wagon->UNNummer = request('UNNummer');
      $wagon->versandbanhof = request('zugversandbanhof');
      $wagon->bestimmungsbanhof = request('zugbestimmungsbanhof');
      $wagon->datum = request('zugdatum');
      if (request('lastwechselundbremsgewicht') == "Leer") {
        $wagon->b = request('AnzahlderAcshen');
      }
      if (request('lastwechselundbremsgewicht') != "Leer") {
        $wagon->a = request('AnzahlderAcshen');
      }
      if (request('bremsstellung') == "P") {
        $wagon->d = request('Bremsgewicht');
      }
      if (request('bremsstellung') == "G") {
        $wagon->e = request('Bremsgewicht');
      }
      if (request('hinweisezureibungsbremse') == "K") {
        $wagon->k = "X";
      }
      if (request('hinweisezureibungsbremse') == "L" || request('hinweisezureibungsbremse') == "LL") {
        $wagon->l = "X";
      }
      if (request('hinweisezureibungsbremse') == "D") {
        $wagon->sh = "X";
      }
      if (request('bemerkungenzurfeststellbremse') == "bühnenbedienbar" || request('bemerkungenzurfeststellbremse') == "bodenbedienbar") {
        $wagon->h = "X";
      }
      if (request('UNNummer') == "") {
        $wagon->bm = request('Schadwagen');
      }
      if (request('UNNummer') != "") {
        $wagon->bm = request('UNNummer');
      }

      $wagon->fir = substr($wagon->wagennummer, 0, 2);
      $wagon->sec = substr($wagon->wagennummer, 2, 2);
      $wagon->thir = substr($wagon->wagennummer, 4, 4);
      $theRest = substr($wagon->wagennummer, 8);
      $wagon->four = substr($theRest, 0, 3);
      $wagon->five = substr($theRest, 3, 3);

      $wagon->ge = (int) $wagon->eigenmasse + (int)$wagon->GewichtderLadung;
      
      $wagon->bremsgewichte = request('bremsgewichte');
      $wagon->revsdatum = request('revsdatum');
      $wagon->gultigkeit = request('gultigkeit');
      $wagon->empty = request('empty');
      $wagon->sonstigebemerkungen = request('sonstigebemerkungen');
      $wagon->maxzuladung = request('maxzuladung');
      if (request('revsdatum') != ""){
        $wagon->alertdate = request('alertdate');
      }
      else{
        $wagon->alertdate = null;
      }
        
      
      
      
      $user = Auth::user();
      $bossid = $zugdata->first()->bossid;
      if($user->type == "boss"){
        $wagon->idboss = $user->id;
        $wagon->iduser = $user->id;
        $wagon->save();
        relation::create([
          'zug_id' => request('zugid'),
          'wagon_id' => $wagon->id
        ]);
        if($wagon->arch == 0){
          return redirect()->route('wagons.show', $zug);
        }
        else {
          return redirect()->route('wagonarchivelist', $bossid);
        }
      }
      if($user->type == "admin"){
        $wagon->idboss = $bossid;
        $wagon->iduser = $bossid;
        
        $wagon->save();
        relation::create([
          'zug_id' => request('zugid'),
          'wagon_id' => $wagon->id
        ]);
        if($wagon->arch == 0){
          return redirect()->route('wagons.show', $zug);
        }
        else {
          return redirect()->route('wagonarchivelist', $bossid);
        }
        
      }
      else{
        $wagon->idboss = $bossid;
        $wagon->iduser = $user->id;
        $wagon->save();
        relation::create([
          'zug_id' => request('zugid'),
          'wagon_id' => $wagon->id
        ]);
        return redirect()->route('wagons.show', $zug);
      }
      
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
    $zugid = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
      ->join('zugs', 'zugs.id', '=', 'relations.zug_id')
      ->where('wagons.id', $id)
      ->pluck('zug_id');
      $wagon = Wagon::find($id);
      if (Wagon::where('arch', 1)->where('wagennummer', request('wagennummer'))->where('zugid', $wagon->zugid )->exists()) {
        if ($wagon->arch == 0){
        $wg=DB::table('wagons')->where('wagennummer', request('wagennummer'))->where('zugid', $wagon->zugid )->pluck("id");
        DB::table('relations')->where('wagon_id',$wg)->delete();
        DB::table('wagons')->where('id', $wg)->delete();
  
          $this->validate(
            $request,
            [
    
              'wagennummer' => 'required|unique:wagons,wagennummer,'.$wagon->id.',id,zugid,' . $wagon->zugid  
    
            ],
            [
              'wagennummer.unique' => 'Die Wagennummer ist bereits vergeben!',
    
            ]
          );
          $x=$request->wagennummer;
        }
        if ($wagon->arch == 1){
    
            $this->validate(
              $request,
              [
      
                'wagennummer' => 'required|unique:wagons,wagennummer,'.$wagon->id.',id,zugid,' . $wagon->zugid  
      
              ],
              [
                'wagennummer.unique' => 'Die Wagennummer ist bereits vergeben!',
      
              ]
            );
            $x=$request->wagennummer;
          }
        
      } else {
        $this->validate(
          $request,
          [
            'wagennummer' => 'required|unique:wagons,wagennummer,'.$wagon->id.',id,zugid,' . $wagon->zugid 
          ],
          [
            'wagennummer.unique' => 'Die Wagennummer ist bereits vergeben!',
  
          ]
        );
        $x=$request->wagennummer;
      }
  
    
    // Getting values from the blade template form
    $wagon->wagennummer = $x;

    $wagon->gattungsbuchstabe = $request->get('gattungsbuchstabe');
    $wagon->längeüberpuffer = $request->get('längeüberpuffer');
    $wagon->bremsgewichte = $request->get('bremsgewichte');
    
    if (request('revsdatum') != ""){
      $wagon->alertdate = $request->get('alertdate');
    }
    else{
      $wagon->alertdate = null;
    }
    $wagon->arch = request('arch');
      $wagon->revsdatum = $request->get('revsdatum');
      $wagon->gultigkeit = $request->get('gultigkeit');
      $wagon->empty = $request->get('empty');
      $wagon->maxzuladung = $request->get('maxzuladung');
      $wagon->sonstigebemerkungen = request('sonstigebemerkungen');
      
    $wagon->eigenmasse = $request->get('eigenmasse');
    $wagon->AnzahlderAcshen = $request->get('AnzahlderAcshen');
    $wagon->GewichtderLadung = $request->get('GewichtderLadung');
    $wagon->Bremsgewicht = $request->get('Bremsgewicht');
    $wagon->lastwechselundbremsgewicht = $request->get('lastwechselundbremsgewicht');
    $wagon->bremsstellung = $request->get('bremsstellung');
    $wagon->hinweisezureibungsbremse = $request->get('hinweisezureibungsbremse');
    $wagon->bemerkungenzurfeststellbremse = $request->get('bemerkungenzurfeststellbremse');
    $wagon->bemerkung = request('lademaßüberschreitung') . "," . request('außergewöhnlichesendung') . ","  . request('windgefährdeteladung');

    $wagon->Schadwagen = $request->get('Schadwagen');
    $wagon->Beladenmitgefahrgut = $request->get('Beladenmitgefahrgut');
    $wagon->UNNummer = $request->get('UNNummer');
    $wagon->b = null;
    $wagon->a = null;
    $wagon->d = null;
    $wagon->e = null;
    $wagon->k = null;
    $wagon->l = null;
    $wagon->sh = null;
    $wagon->h = null;
    $wagon->bm = null;

    if (request('lastwechselundbremsgewicht') == "Leer") {
      $wagon->b = request('AnzahlderAcshen');
    }
    if (request('lastwechselundbremsgewicht') != "Leer") {
      $wagon->a = request('AnzahlderAcshen');
    }
    if (request('bremsstellung') == "P") {
      $wagon->d = request('Bremsgewicht');
    }
    if (request('bremsstellung') == "G") {
      $wagon->e = request('Bremsgewicht');
    }
    if (request('hinweisezureibungsbremse') == "K") {
      $wagon->k = "X";
    }
    if (request('hinweisezureibungsbremse') == "L" || request('hinweisezureibungsbremse') == "LL") {
      $wagon->l = "X";
    }
    if (request('hinweisezureibungsbremse') == "D") {
      $wagon->sh = "X";
    }
    if (request('bemerkungenzurfeststellbremse') == "bühnenbedienbar" || request('bemerkungenzurfeststellbremse') == "bodenbedienbar") {
      $wagon->h = "X";
    }
    if (request('UNNummer') == "") {
      $wagon->bm = request('Schadwagen');
    }
    if (request('UNNummer') != "") {
      $wagon->bm = request('UNNummer');
    }
    $wagon->fir = substr($wagon->wagennummer, 0, 2);
    $wagon->sec = substr($wagon->wagennummer, 2, 2);
    $wagon->thir = substr($wagon->wagennummer, 4, 4);
    $theRest = substr($wagon->wagennummer, 8);
    $wagon->four = substr($theRest, 0, 3);
    $wagon->five = substr($theRest, 3, 3);

    $wagon->ge = (int) $wagon->eigenmasse + (int)$wagon->GewichtderLadung;
    $wagon->save();

    if($wagon->arch == 0){
      return redirect()->route('wagons.show', $zugid[0]);
    }
    else {
      return redirect()->route('wagonarchivelist', $wagon->idboss);
    }
  }
  public function show1(Request $request)
  {
    $wagon = Wagon::where('id', $request->id)
      ->get();
    return view('edit', compact('wagon'));
  }
  public function showarch(Request $request)
  {
    $wagon = Wagon::where('id', $request->id)
      ->get();
    return view('editarch', compact('wagon'));
  }
  public function search(Request $request)
  {

    $zugnummer = $request->input('one');
    $Datum = $request->input('tow');
    $versandbahnof = $request->input('three');
    $bestimmungsbahnhof = $request->input('four');
    $ref = $request->input('five');
    if (!$zugnummer && !$Datum && !$versandbahnof && !$bestimmungsbahnhof && !$ref) {
      $list = DB::table('wagons')
        ->join('relations', 'wagons.id', '=', 'relations.wagon_id')
        ->join('zugs', 'zugs.id', '=', 'relations.zug_id')->get();
      return view('List', compact('list'));
    } else {
      $list = DB::table('wagons')
        ->join('relations', 'wagons.id', '=', 'relations.wagon_id')
        ->join('zugs', 'zugs.id', '=', 'relations.zug_id')
        ->where(function ($query) use ($zugnummer, $Datum, $versandbahnof, $bestimmungsbahnhof, $ref) {
          if ($zugnummer) {
            $query->where('zugs.zugnummer', $zugnummer);
          }
          if ($Datum) {
            $query->where('zugs.datum', 'like', "%{$Datum}%");
          }
          if ($versandbahnof) {
            $query->where('zugs.versandbanhof', 'like', "%{$versandbahnof}%");
          }
          if ($bestimmungsbahnhof) {
            $query->where('zugs.bestimmungsbanhof', 'like', "%{$bestimmungsbahnhof}%");
          }
          if ($ref) {
            $query->where('zugs.ref', 'like', "%{$ref}%");
          }
        })
        ->get();
      return view('List', compact('list'));
    }


    // echo $true1;echo $true2;echo $true3;echo $true4;echo $true5;




  }
}
