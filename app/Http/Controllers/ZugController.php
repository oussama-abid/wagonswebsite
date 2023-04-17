<?php

namespace App\Http\Controllers;

use App\Models\Zug;
use App\Models\Wagon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class ZugController extends Controller
{
    public function deleteone(int $zug){

        $wagonsid=DB::table('relations')->where('zug_id', $zug)->pluck('wagon_id');
        DB::table('relations')->where('zug_id', $zug)->delete();
       for($i=0;$i<count($wagonsid);$i++){
        DB::table('wagons')->where('id', $wagonsid[$i])->update(['arch' => 1]);
       }
       DB::table('zugs')->where('id', $zug)->delete();
       return back();    
    }
    public function show (){
        $data = Zug::all();
        $user = Auth::user(); 
        $nachname = $user->name;
        return view('welcome',['zugs'=>$data],['nachname' => $nachname]);
    }
    public function show1(Request $request)
    {
      $zug = Zug::where('id', $request->id)
        ->get();
        $user = Auth::user();
        $bossid = $zug->first()->bossid;
        $userid = $zug->first()->userid;

        if($user->type == "boss"){
          
          if( $bossid  == $user->id){
            
            return view('edit-zug', compact('zug'));
          }
          else{
            return redirect()->back();
          }
        }
        if($user->type == "admin"){
          return view('edit-zug', compact('zug'));
        }
        else{
          if( $userid  == $user->id){
            
            return view('edit-zug', compact('zug'));
          }
          else{
            return redirect()->back();
          }
        }

      
    }
    public function store(Request $request)
    {
        $zug = new Zug;
        $zug->name = $request['name'];
        $zug->nachname = $request['nachname'];
        $zug->versandbanhof = $request['versandbanhof'];
        $zug->bestimmungsbanhof = $request['bestimmungsbanhof'];
        $zug->datum = $request['datum'] ;
        $zug->ref = $request['ref'];
        $zug->zugnummer = $request['zugnummer'];
        $zug->Mindestbremshunderstel = $request['Mindestbremshunderstel'];  
        $zug->bossid = Auth::id();
        $zug->userid = Auth::id();
        $zug->save();
    }
    public function createarchive(Zug $zug)
    {
      
      $user = Auth::user(); 
      $bossid = $zug->bossid;
      if($user->type == "boss"){
          
        if( $bossid  == $user->id){
          $list = Wagon::where('zugid',$zug->id)->get();
          return view('addarchive',['zug'=>$zug],compact('list'));
        }
        else{
          return redirect()->back();
        }
      }
      if($user->type == "admin"){
        $list = Wagon::where('zugid',$zug->id)->get();
        return view('addarchive',['zug'=>$zug],compact('list'));
      }
      else{
        
        return redirect()->back();
      }
       

    }
    public function create(Zug $zug)
    {
      
      $user = Auth::user(); 
      $bossid = $zug->bossid;
      if($user->type == "boss"){
          
        if( $bossid  == $user->id){
          $list = Wagon::where('zugid',$zug->id)->get();
          return view('add',['zug'=>$zug],compact('list'));
        }
        else{
          return redirect()->back();
        }
      }
      if($user->type == "admin"){
        $list = Wagon::where('zugid',$zug->id)->get();
        return view('add',['zug'=>$zug],compact('list'));
      }
      else{
        $list = Wagon::where('idboss', $bossid)->where('iduser',$bossid)->where('arch', 1)->get();
        return view('add',['zug'=>$zug],compact('list'));
      }
       

    }
    public function getList(Request $request)
    {
      $bossid = $request->input('bossid');
      $search = $request->input('search');
      $list = Wagon::where('idboss', $bossid)
          ->where('iduser', $bossid)
          ->where('arch', 1)
          ->where('wagennummer', 'LIKE', $search . '%')
          ->get();
      $html = '';
      foreach ($list as $item) {
          $html .= '<div>'.$item->wagennummer.'</div>';
      }
      return response()->json($html);
    }

    public function update(Request $request, $id)
{
   $zug = Zug::find($id);
   $zug->name = $request['name'];
        $zug->nachname = $request['nachname'];
        $zug->versandbanhof = $request['versandbanhof'];
        $zug->bestimmungsbanhof = $request['bestimmungsbanhof'];
        $zug->datum = $request['datum'];
        $zug->ref = $request['ref'];
        $zug->zugnummer = $request['zugnummer'];
        $zug->Mindestbremshunderstel = $request['Mindestbremshunderstel'];  
        $zug->seczugnummer = $request['seczugnummer'];  
        $zug->betriebsstelle = $request['betriebsstelle'];  
        $zug->secbetriebsstelle = $request['secbetriebsstelle'];  
        $zug->evu = $request['evu'];  
        $zug->save();
        $zugs = DB::table('zugs')
        ->where('id', $id)
        ->get();
  
      $wagons = Wagon::join('relations', 'wagons.id', '=', 'relations.wagon_id')
        ->join('zugs', 'zugs.id', '=', 'relations.zug_id')
        ->where('zugs.id', $id)
        ->where('wagons.arch',0)
        ->get();
        return redirect('/');
      
}


public function uploadlogo(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    $imageName = time().'.'.$request->image->extension();  
   
    $request->image->move(public_path('images'), $imageName);
   
    $zug = Zug::find($request->idzug);
    $zug->logo = $imageName;
         $zug->save();

    $zugs = Zug::where('bossid',$zug->bossid)->get();
    $nb = Zug::where('bossid',$zug->bossid)->count();
    foreach ($zugs as $zugelem) {
      $zugelem->logo = $imageName; // set the new value for the "name" column
      $zugelem->update(); // save the updated record in the database
  }
   
    
    return back()
        ->with('success','Image uploaded successfully.')
        ->with('image',$imageName);
}






public function bossshow (){
  $userId = Auth::id();
  $data = Zug::where('bossid',$userId)->get();
  $user = Auth::user(); 
  $nachname = $user->name;
  return view('boss/welcomeboss',['zugs'=>$data],['nachname' => $nachname]);
}


public function empshow (){
  $user = Auth::user();
  $data = Zug::where('userid',Auth::id())->get();
  $user = Auth::user(); 
  $nachname = $user->name;
  return view('employee/welcomeemp',['zugs'=>$data],['nachname' => $nachname]);
}













}
