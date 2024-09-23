<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class InventoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('inventory.index', [
            'inventory' => Inventory::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventoryRequest $request) : RedirectResponse
    {
        Inventory::create($request->all());
        return redirect()->route('inventory.index')
                ->withSuccess('New Item is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory) : View
    {
        return view('inventory.show', [
            'inventory' => $inventory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory) : View
    {
        return view('inventory.edit', [
            'inventory' => $inventory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryRequest $request, Inventory $inventory) : RedirectResponse
    {
        $inventory->update($request->all());
        return redirect()->back()
                ->withSuccess('Inventory is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory) : RedirectResponse
    {
        $inventory->delete();
        return redirect()->route('inventory.index')
                ->withSuccess('Inventory is deleted successfully.');
    }


    public function save(Request $request): JsonResponse
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file('image')) {
            $fileName =  "image-" . time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('image', $fileName);

            $image = new Image;
            $image->image = $fileName;
            $image->save();

            return response()->json(["image" => $fileName]);
        }
    }
}
