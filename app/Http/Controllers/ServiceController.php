<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;

use Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol:user');
    }

    public function index()
    {
        $data = Auth::user()->services()->orderBy('created_at', 'desc')->get();
        return view('services.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'name' => 'required',
            'status' => 'required',
        ]);

        $attributes = $request->all() + ['user_id' => auth()->id()];

        Service::create($attributes);

        return back()->with('success', 'A new service has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Service::findOrFail($id);
        return view('services.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Service::findOrFail($id);
        return view('services.edit', compact('data'));
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
        $this->validate($request,[
            'name' => 'required',
            'status' => 'required',
        ]);

        $attributes = $request->all();
        $data = Service::findOrFail($id);
        $data->update($attributes);

        return back()->with('success', 'Service has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Service has been deleted.');
    }
}
