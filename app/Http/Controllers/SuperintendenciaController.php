<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $superintendencias = new Superintendencia;

        $superintendencias = $superintendencia->orderby('superintendencia')->paginate(15);

        return view('superintendencia.index', compact('superintendencias'));

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

        Session::flash('superintendencia_superintendencia', 'superintendencia cadastrado com sucesso!');

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
        $superintendencias = Superintendencia::findOrFail($id);

        return view('superintendencia.show', compact('superintendencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superintendencias = Superintendencia::findOrFail($id);

        return view('superintendencia.edit', compact('superintendencias'));
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
        $superintendencias = Superintendencia::findOrFail($id);

        $superintendencia->update($request->all());

        Session::flash('edited_superintendencia', 'Superintendencia alterado com sucesso!');

        return redirect(route('superintendencia.edit', $id));
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

        Session::flash('deleted_superintendencia', 'Superintendencia excluído com sucesso!');

        return redirect(route('superintendencia.index'));
    }
}
