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
        Compra::create($request->all());

        Session::flash('create_compra', 'Salvo com sucesso!');

        return redirect(route('compras.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::findOrFail($id);

        return view('compras.show',compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);

        $trs = Tr::orderBy('tr')->get();
        $users = User::orderBy('name')->get();

        return view('compras.edit', compact('compra','trs','users'));
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
        $compra = Compra::findOrFail($id);

        $compra->update($request->all());

        Session::flash('create_compra', 'Item alterado com sucesso!');

        return redirect(route('compras.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Compra::findOrFail($id)->delete();

        Session::flash('deleted_compra', 'Item excluído com sucesso!');

        return redirect(route('compras.index'));
    }

}
