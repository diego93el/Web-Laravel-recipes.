<?php

namespace App\Http\Controllers;

use App\Models\Dificultade;
use Illuminate\Http\Request;

/**
 * Class DificultadeController
 * @package App\Http\Controllers
 */
class DificultadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dificultades = Dificultade::paginate();

        return view('dificultade.index', compact('dificultades'))
            ->with('i', (request()->input('page', 1) - 1) * $dificultades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dificultade = new Dificultade();
        return view('dificultade.create', compact('dificultade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Dificultade::$rules);

        $dificultade = Dificultade::create($request->all());

        return redirect()->route('dificultades.index')
            ->with('success', 'Dificultade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dificultade = Dificultade::find($id);

        return view('dificultade.show', compact('dificultade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dificultade = Dificultade::find($id);

        return view('dificultade.edit', compact('dificultade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dificultade $dificultade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dificultade $dificultade)
    {
        request()->validate(Dificultade::$rules);

        $dificultade->update($request->all());

        return redirect()->route('dificultades.index')
            ->with('success', 'Dificultade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dificultade = Dificultade::find($id)->delete();

        return redirect()->route('dificultades.index')
            ->with('success', 'Dificultade deleted successfully');
    }
}
