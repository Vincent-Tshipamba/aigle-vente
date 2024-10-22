<?php

namespace App\Http\Controllers;

use App\Models\PanierItem;
use App\Http\Requests\StorePanierItemRequest;
use App\Http\Requests\UpdatePanierItemRequest;

class PanierItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePanierItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PanierItem $panierItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PanierItem $panierItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePanierItemRequest $request, PanierItem $panierItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PanierItem $panierItem)
    {
        //
    }
}
