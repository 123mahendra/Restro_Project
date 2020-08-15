<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
use Session;
use Crypt;
class RestroController extends Controller
{
    //
    function index()
    {
        return view('home');
    }
    function list()
    {
        $data = Restaurant::all();
        return view('list', ["data"=>$data]);
    }
    function view()
    {
        return view('add');
    }
    function store(Request $store)
    {
        // return $store->input();
        $restro = new Restaurant;
        $restro->name = $store->input('name');
        $restro->email = $store->input('email');
        $restro->address = $store->input('address'); 
        $restro->save();
        $store->session()->flash('status','Restaurant Submitted Successfully');
        
        return redirect('list');
    }
    function delete($id)
    {
        Restaurant::find($id)->delete();
        Session::flash('status','Restaurant Deleted Successfully');
        
        return redirect('list');
    }
    function edit($id)
    {
        $data = Restaurant::find($id);
        return view('edit',["data"=>$data]);
    }
    function update(Request $update)
    {
        //  return $update->input();
        $restro = Restaurant::find($update->input('id'));
        $restro->name = $update->input('name');
        $restro->email = $update->input('email');
        $restro->address = $update->input('address'); 
        $restro->save();
        $update->session()->flash('status','Restaurant Updated Successfully');
        
        return redirect('list');
    }
    function register(Request $register)
    {
        // echo Crypt::encrypt('123@abc');
        // return $register->input();
        $user = new User;
        $user->name = $register->input('name');
        $user->email = $register->input('email');
        $user->password = Crypt::encrypt($register->input('password'));
        $user->contact = $register->input('contact');
        $user->save();
        $register->session()->put('user',$register->input('name'));
        
        return redirect('/');
    }
    function login(Request $login)
    {
        $user= User::where("email",$login->input('email'))->get();
        if(Crypt::decrypt($user[0]->password)==$login->input('password'))
        {
            $login->session()->put('user', $user[0]->name);
            return redirect('/');
        }
    }
}
