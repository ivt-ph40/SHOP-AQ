<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;


use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('user.list', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store( Request $request)
    {
    	//$data = $request->validate([
            
         //    'email' => 'required|email|unique:users,email',
        //   'password' => 'required|numeric|min:6',
  
        //]);
        $data = $request->all();
    	
    	User::create($data);
    	return Redirect()->route('user.index');
       //return view('user.list', compact('users'));
    }

    public function show($id)
    {
        $users = User::with('role')->find($id);
        // dd($users->toArray());
        return view('user.show', compact('users'));
    }
    

    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit', compact('users'));
    }
    public function update($id, Request $request)
    {
     $data = $request->except('_token','_method');
   
     User::find($id)->update($data);
     return Redirect()->route('user.index')->with('message', 'update success!');
    }

    public function delete($id)
    {

    }
    public function destroy($id)
    {
        $users = User::find($id);
        
        $users->delete();

        return Redirect()->route('user.index')->with('message', 'delete success!');
    }
}
