<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Compra;
use App\User;
use App\Tr;

class CompraController extends Controller
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
        $compra = new Compra;

        $compra = $compra->orderby('pac')->paginate(15);

        return view('compras.index', compact('compra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compra = Compra::orderBy('pac')->get();
        $trs = Tr::orderBy('tr')->get();
        $users = User::orderBy('name')->get();

        return view('compras.create', compact('compra','trs','users'));
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

        $compra = Superintendencia::orderBy('superintendencia')->get();
        $setors = Setor::orderBy('setor')->get();
        $users = User::orderBy('name')->get();

        return view('tr.edit', compact('tr','compra','setors','users'));
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

}
