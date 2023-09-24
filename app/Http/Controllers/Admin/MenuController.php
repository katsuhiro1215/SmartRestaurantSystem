<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreMenuRequest;
use App\Http\Requests\Update\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function index(): View
    {
        $menus = Menu::latest()->paginate(20);

        return view('admin.menu.index', compact('menus'));
    }

    public function create(): View
    {
        $menuCategories = MenuCategory::all();

        return view('admin.menu.create', compact('menuCategories'));
    }

    public function store(StoreMenuRequest $request): RedirectResponse
    {
        $menu = Menu::create([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'name_en' => $request->name_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'detail' => $request->detail,
            'detail_en' => $request->detail_en,
            'slug' => strtolower(str_replace(' ', '-', $request->name_en)),
            'code' => Str::random(8),
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => $request->status,
        ]);

        if ($request->file('menu_photo_path')) {
            $file = $request->file('menu_photo_path');
            $folderName = 'menus';
            $fileNameToStore = ImageService::uploadMiddleThumbnail($file, $folderName);
            $menu->menu_photo_path = $fileNameToStore;
        }

        $menu->save();

        $notification = array(
            'message' => 'メニューの保存に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.menu.index')->with($notification);
    }

    public function show(Menu $menu): View
    {
        $menu = Menu::findOrFail($menu->id);

        return view('admin.menu.show', compact('menu'));
    }

    public function edit(Menu $menu): View
    {
        $menu = Menu::findOrFail($menu->id);
        $menuCategories = MenuCategory::all();
        
        return view('admin.menu.edit', compact('menu', 'menuCategories'));
    }

    public function update(UpdateMenuRequest $request, Menu $menu): RedirectResponse
    {
        $menu = Menu::findOrFail($menu->id);

        $menu->menu_category_id = $request->menu_category_id;
        $menu->name = $request->name;
        $menu->name_en = $request->name_en;
        $menu->description = $request->description;
        $menu->description_en = $request->description_en;
        $menu->detail = $request->detail;
        $menu->detail_en = $request->detail_en;
        $menu->slug = $request->slug;
        $menu->code = $request->code;
        $menu->selling_price = $request->selling_price;
        $menu->discount_price = $request->discount_price;
        $menu->hot_deals = $request->hot_deals;
        $menu->featured = $request->featured;
        $menu->special_offer = $request->special_offer;
        $menu->special_deals = $request->special_deals;
        $menu->status = $request->status;

        if ($request->file('menu_photo_path')) {
            $file = $request->file('menu_photo_path');
            $folderName = 'menus';
            $fileNameToStore = ImageService::uploadMiddleThumbnail($file, $folderName);
            $menu->menu_photo_path = $fileNameToStore;
        }

        $menu->save();

        $notification = array(
            'message' => 'メニューの更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.menu.index')->with($notification);
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        Menu::findOrFail($menu->id)->delete();
        
        $notification = array(
            'message' => 'メニューの削除に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.menu.index')->with($notification);
    }

    public function expiredIndex()
    {
        $expiredMenu = Menu::onlyTrashed()->get();

        return view('admin.menu.expired', compact('expiredMenu'));
    }

    public function expiredRestore($menu)
    {
        Menu::withTrashed()->findOrFail($menu->id)->restore();

        $notification = array(
            'message' => 'メニューの復元に成功しました。',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.expiredMenu.index')->with($notification);
    }

    public function expiredDestroy($menu)
    {
        Menu::onlyTrashed()->findOrFail($menu->id)->forceDelete();

        $notification = array(
            'message' => 'メニューを完全に削除しました。',
            'alert-type' => 'danger'
        );

        return redirect()->route('admin.expiredMenu.index')->with($notification);;
    }
}
