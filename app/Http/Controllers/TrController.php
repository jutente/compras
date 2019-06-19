<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Tr;
use App\Setor;
use App\Superintendencia;
use App\User;

class TrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tr = new Tr;

        if (request()->has('tr')){
            $tr = $tr->where('tr', 'like',  '%' . request('tr') . '%');
        }

        $tr = $tr->orderby('tr')->paginate(15);

        return view('tr.index', compact('tr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $superintendencias = Superintendencia::orderBy('superintendencia')->get();
        $setors = Setor::orderBy('setor')->get();
        $users = User::orderBy('name')->get();

        return view('tr.create', compact('superintendencias','setors','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tr::create($request->all());

        Session::flash('create_tr', 'TR cadastrado com sucesso!');

        return redirect(route('tr.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tr = Tr::findOrFail($id);

        return view('tr.show',compact('tr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tr = Tr::findOrFail($id);

        $superintendencias = Superintendencia::orderBy('superintendencia')->get();
        $setors = Setor::orderBy('setor')->get();
        $users = User::orderBy('name')->get();

        return view('tr.edit', compact('tr','superintendencias','setors','users'));
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
        $tr = Tr::findOrFail($id);

        $tr->update($request->all());

        Session::flash('create_tr', 'TR alterada com sucesso!');

        return redirect(route('tr.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tr::findOrFail($id)->delete();

        Session::flash('deleted_tr', 'TR excluída com sucesso!');

        return redirect(route('tr.index'));
    }

    public function detalhar($id)
    {
        $tr = Tr::findOrFail($id);

        return view('tr.detalhar',compact('tr'));
    }

}
