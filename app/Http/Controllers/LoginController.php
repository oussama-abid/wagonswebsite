<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wagon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Zug;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            switch ($user->type) {
                case 'admin':
                    return redirect('/');
                    break;
                case 'boss':

                    return redirect('/home-Firmenchef');
                    break;
                case 'employee':
                    return redirect('/home-employee');
                    break;
                default:
                    return 'no';
            }
        }

        return redirect()->back()->withInput()->withErrors(['login' => 'Bitte überprüfen Sie Ihre E-Mail oder Ihr Passwort']);
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:3',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'type' => "boss",
        ]);

        $user->save();

        return redirect('/usersmanagment')->with('message', 'Account created!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function registeremployee(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:3',
        ]);
        $userId = Auth::id();
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'type' => "employee",
            'userboss' => $userId,
        ]);

        $user->save();

        return redirect('/employeesmanagment')->with('message', 'Account created!');
    }

    public function usersmanagment()
    {
        $users = User::where('type', ['boss'])->get();
        return view('/usersmanagment', ['users' => $users]);
    }
    public function  archivmanagment()

    {
        $loguser = Auth::user();
        if ($loguser->type == "admin") {
            $users = User::where('type', ['boss'])->get();
            return view('/archivemanagment', ['users' => $users]);
        } else {

            return redirect()->back();
        }
    }

    public function employeesmanagment()
    {
        $id = Auth::id();
        $users = User::where('type', ['employee'])->where('userboss', $id)->get();
        return view('/employeemanagment', ['users' => $users], ['userid' => $id]);
    }

    public function edituser(Request $request)
    {
        $loguser = Auth::user();
        if ($loguser->type == "admin") {
            $user = User::where('id', $request->id)->get();
            return view('edit-user', compact('user'));
        }
        if ($loguser->type == "boss") {
            $user = User::where('id', $request->id)->get();
            if ($user->first()->userboss  == $loguser->id) {

                return view('edit-user', compact('user'));
            } else {
                return redirect()->back();
            }
        }
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => $request->input('password') ? 'min:3' : '',
        ]);

        $user->name = $validatedData['name'];
        if ($request->input('password')) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->email = $validatedData['email'];

        $user->save();
        $loguser = Auth::user();
        if ($loguser->type == "admin") {
            return redirect('/usersmanagment')->with('message', 'Account edited!');
        }
        if ($loguser->type == "boss") {
            return redirect('/employeesmanagment')->with('message', 'Account edited!');
        }
    }
    public function deleteboss(int $user)
    {

        $userssid = DB::table('users')->where('userboss', $user)->pluck('id');
        $zugsid = Zug::where('bossid', $user)->pluck('id');
        if (count($zugsid) > 0) {
            for ($i = 0; $i < count($zugsid); $i++) {

                $wagonsid = DB::table('relations')->where('zug_id', $zugsid[$i])->pluck('wagon_id'); // Append the wagon ID to the $wagonsid array


                DB::table('relations')->where('zug_id', $zugsid[$i])->delete();
                DB::table('zugs')->where('id', $zugsid[$i])->delete();
            }
            if (count($wagonsid) > 0) {
                for ($i = 0; $i < count($wagonsid); $i++) {
                    DB::table('wagons')->where('id', $wagonsid[$i])->delete();
                }
            }
        }
        if (!empty($userssid[0])) {
            for ($i = 0; $i < count($userssid); $i++) {
                DB::table('users')->where('id', $userssid[$i])->delete();
            }
        }

        DB::table('users')->where('id', $user)->delete();
        return redirect('/usersmanagment');
    }
    public function deleteemp(int $user)
    {

        $zugsid = Zug::where('userid', $user)->pluck('id');
        if (count($zugsid) > 0) {
            for ($i = 0; $i < count($zugsid); $i++) {

                $wagonsid[] = DB::table('relations')->where('zug_id', $zugsid[$i])->pluck('wagon_id'); // Append the wagon ID to the $wagonsid array


                DB::table('relations')->where('zug_id', $zugsid[$i])->delete();
                DB::table('zugs')->where('id', $zugsid[$i])->delete();
            }

            for ($i = 0; $i < count($wagonsid); $i++) {
                DB::table('wagons')->where('id', $wagonsid[$i])->delete();
            }
        }

        DB::table('users')->where('id', $user)->delete();
        $loguser = Auth::user();
        if ($loguser->type == "admin") {
            return redirect('/usersmanagment');
        }
        if ($loguser->type == "boss") {
            return redirect('/employeesmanagment');
        }
    }


    public function userslist(int $id)
    {
        $users = User::where('type', ['employee'])->where('userboss', $id)->get();
        $user = User::where('id', $id)->get();
        $name = $user->first()->name;


        return view('/employeeslist', ['users' => $users], ['name' => $name]);
    }

    public function usersarchivelist(int $id)
    {
        $users = User::where('type', ['employee'])->where('userboss', $id)->get();
        $user = User::where('id', $id)->get();
        $name = $user->first()->name;


        return view('/employeeslistarchive', ['users' => $users], ['name' => $name]);
    }
    public function zuglist(int $id)
    {
        $loguser = Auth::user();
        if ($loguser->type == "admin") {
            $data = Zug::where('userid', $id)->get();

            $user = User::where('id', $id)->get();
            $name = $user->first()->name;


            return view('/zugarchivelist', ['zugs' => $data], ['name' => $name]);
        }
        if ($loguser->type == "boss") {
            $users = User::where('type', 'employee')->where('userboss', $loguser->id)->pluck('id');
            if ($users->contains($id) || $loguser->id == $id) {

                $data = Zug::where('userid', $id)->get();

                $user = User::where('id', $id)->get();
                $name = $user->first()->name;


                return view('/zugarchivelist', ['zugs' => $data], ['name' => $name]);
            } else {
                return redirect()->back();
            }
        } else {

            return redirect()->back();
        }
    }
    public function wagonsarchive(int $id)
    {
        $data = Wagon::where('idboss', $id)->where('iduser',$id)->where('arch', 1)->get();
        

            $loguser = Auth::user();
            $zug = Zug::where('bossid',$id)->where('userid',$id)->pluck('id');
            if(count($zug) == 0){
                return redirect()->back()->with('message', 'no zug created yet!');
            }
            else{
            if ($loguser->type == "admin") {
                $data = Wagon::where('idboss', $id)->where('iduser',$id)->where('arch', 1)->get();
                return view('/wagonsarchivelist', ['wagon' => $data], ['zugid' => $zug[0]]);
            }
            if ($loguser->type == "boss") {


                if ($id == $loguser->id) {
                    $data = Wagon::where('idboss', $id)->where('iduser',$id)->where('arch', 1)->get();
                    return view('/wagonsarchivelist', ['wagon' => $data], ['zugid' => $zug[0]]);
                } else {
                    return redirect()->back();
                }
            } else {

                return redirect()->back();
            }
        }
        }
    }

