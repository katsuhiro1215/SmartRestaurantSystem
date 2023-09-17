<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuCategoryRequest;
use App\Http\Requests\UpdateMenuCategoryRequest;
use App\Models\MenuCategory;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuCategory  $menuCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuCategory  $menuCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuCategoryRequest  $request
     * @param  \App\Models\MenuCategory  $menuCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuCategoryRequest $request, MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuCategory  $menuCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuCategory $menuCategory)
    {
        //
    }
}
