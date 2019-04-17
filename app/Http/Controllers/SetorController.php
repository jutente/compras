<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Setor;
use App\Superintendencia;

class SetorController extends Controller
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
        $setor = new Setor;

        $setor = $setor->orderby('setor')->paginate(15);

        return view('setor.index', compact('setor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $superintendencias = Superintendencia::orderBy('superintendencia')->get();

        return view('setor.create', compact('superintendencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Setor::create($request->all());

        Session::flash('create_setor', 'Setor cadastrada com sucesso!');

        return redirect(route('setor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setor = Setor::findOrFail($id);

        return view('setor.show', compact('setor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setor = Setor::findOrFail($id);

        $superintendencias = Superintendencia::orderBy('superintendencia')->get();

        return view('setor.edit', compact('setor','superintendencias'));
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
        $setor = Setor::findOrFail($id);

        $setor->update($request->all());

        Session::flash('create_setor', 'Setor alterada com sucesso!');

        return redirect(route('setor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setor::findOrFail($id)->delete();

        Session::flash('deleted_setor', 'Setor excluída com sucesso!');

        return redirect(route('setor.index'));
    }
}
