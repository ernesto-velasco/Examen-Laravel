<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('getUsers', 'getUser');
        $this->middleware('rol:admin')->except('getUsers', 'getUser');
    }

    public function index()
    {
        $rol = \App\Rol::where('rol', 'user')->firstOrFail();
        $data = User::where('rol', $rol->id)->orderBy('created_at', 'desc')->get();
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'status' => 'required|integer',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'age' => 'required|integer',
            'gender' => 'required|integer',
            'rol' => 'required',
        ]);
        $request['password'] = Hash::make($request->password);
        $attributes = $request->all() + ['rol' => 2];

        User::create($attributes);

        return back()->with('success', 'A new user has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('users.edit', compact('data'));
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
        $attributes = $request->except('password');
        if (isset($request['password']) && $request['password'] != '' ){

            $attributes['password'] = Hash::make($request->password);
        }
        
        $data = User::findOrFail($id);
        $data->update($attributes);

        return back()->with('success', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return back()->with('success', 'User has been deleted.');
    }

    public function userServicesIndex($id)
    {
        $user = User::with('services')->findOrFail($id);
        $data = $user->services;
        return view('services.index', compact('data'));
    }
    public function userServicesShow($id, $service)
    {
        $user = User::findOrFail($id);
        $data = $user->services;
        return view('services.show', compact('data'));
    }
    public function userServicesEdit($id)
    {
        $user = User::findOrFail($id, $service);
        $data = $user->services;
        return view('services.edit', compact('data'));
    }

    public function getUsers(){
        $data = User::select('id', 'name')->with('services')->get();
        return $data;
    }

    public function getUser($id){
        $user = User::select('id', 'name')->with('services')->findOrFail($id);
        return $user;
    }
}
