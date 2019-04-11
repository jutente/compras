<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Superintendencia;

class SuperintendenciaController extends Controller
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
        $superintendencia = new Superintendencia;

        $superintendencia = $superintendencia->orderby('superintendencia')->paginate(15);

        return view('superintendencia.index', compact('superintendencia'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superintendencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Superintendencia::create($request->all());

        Session::flash('create_superintendencia', 'Superintendencia cadastrada com sucesso!');

        return redirect(route('superintendencia.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $superintendencia = Superintendencia::findOrFail($id);

        return view('superintendencia.show', compact('superintendencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superintendencia = Superintendencia::findOrFail($id);

        return view('superintendencia.edit', compact('superintendencia'));
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
        $superintendencia = Superintendencia::findOrFail($id);

        $superintendencia->update($request->all());

        Session::flash('create_superintendencia', 'Superintendencia alterada com sucesso!');

        return redirect(route('superintendencia.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Superintendencia::findOrFail($id)->delete();

        Session::flash('deleted_superintendencia', 'Superintendencia excluída com sucesso!');

        return redirect(route('superintendencia.index'));
    }
}
