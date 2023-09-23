<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreMenuCategoryRequest;
use App\Http\Requests\Update\UpdateMenuCategoryRequest;
use App\Models\MenuCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MenuCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function create(): View
    {
        $menuCategories = MenuCategory::latest()->paginate(20);

        return view('admin.menu.category.create', compact('menuCategories'));
    }

    public function store(StoreMenuCategoryRequest $request): RedirectResponse
    {
        MenuCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'カテゴリーの登録に成功しました。',
            'status' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function show(MenuCategory $menuCategory): View
    {
        $menuCategory = MenuCategory::findOrFail($menuCategory->id);

        return view('admin.menu.category.show', compact('menuCategory'));
    }

    public function edit(MenuCategory $menuCategory): View
    {
        $menuCategory = MenuCategory::findOrFail($menuCategory->id);

        return view('admin.menu.category.edit', compact('menuCategory'));
    }

    public function update(UpdateMenuCategoryRequest $request, MenuCategory $menuCategory): RedirectResponse
    {
        $menuCategory->name = $request->name;
        $menuCategory->description = $request->description;
        $menuCategory->save();

        $notification = array(
            'message' => 'カテゴリーの更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.menuCategory.create')->with($notification);
    }

    public function destroy(MenuCategory $menuCategory): RedirectResponse
    {
        MenuCategory::findOrFail($menuCategory->id)->delete();

        $notification = array(
            'message' => 'カテゴリーの削除に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.menuCategory.create')->with($notification);
    }

    public function expiredIndex()
    {
        $expiredMenuCategory = MenuCategory::onlyTrashed()->get();

        return view('admin.menu.category.expired', compact('expiredMenuCategory'));
    }

    public function expiredRestore($menuCategory)
    {
        MenuCategory::withTrashed()->findOrFail($menuCategory->id)->restore();

        $notification = array(
            'message' => 'メニューの復元に成功しました。',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.expiredMenuCategory.index')->with($notification);
    }

    public function expiredDestroy($menuCategory)
    {
        MenuCategory::onlyTrashed()->findOrFail($menuCategory->id)->forceDelete();

        $notification = array(
            'message' => 'メニューを完全に削除しました。',
            'alert-type' => 'danger'
        );

        return redirect()->route('admin.expiredMenuCategory.index')->with($notification);;
    }
}
