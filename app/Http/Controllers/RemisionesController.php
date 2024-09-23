<?php

namespace App\Http\Controllers;


use App\Models\Remisiones;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRemisionesRequest;
use App\Http\Requests\UpdateRemisionesRequest;

class RemisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('remisiones.index', [
            'remisiones' => Remisiones::latest()->paginate(3)
        ]);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('remisiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRemisionesRequest $request) : RedirectResponse
    {
        Remisiones::create($request->all());
        return redirect()->route('remisiones.index')
                ->withSuccess('New Remision is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Remisiones $remisiones) : View
    {
        return view('remisiones.show', [
            'remisiones' => $remisiones
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Remisiones $remisiones) : View
    {
        return view('remisiones.edit', [
            'remisiones' => $remisiones
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRemisionesRequest $request, Remisiones $remisiones) : RedirectResponse
    {
        $remisiones->update($request->all());
        return redirect()->back()
                ->withSuccess('Remisiones is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Remisiones $remisiones) : RedirectResponse
    {
        $remisiones->delete();
        return redirect()->route('remisiones.index')
                ->withSuccess('Remisiones is deleted successfully.');
    }
}
