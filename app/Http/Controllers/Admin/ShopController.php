<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreShopRequest;
use App\Http\Requests\Update\UpdateShopRequest;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\ImageService;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }
    
    public function index(): View
    {
        $admin = Auth::user();
        $shops = $admin->shops()->paginate(20);

        return view('admin.shop.index', compact('shops'));
    }

    public function create(): View
    {
        return view('admin.shop.create');
    }

    public function store(StoreShopRequest $request): RedirectResponse
    {
        $shop = Shop::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'address3' => $request->address3,
            'address4' => $request->address4,
            'phone_number' => $request->phone_number,
            'fax_number' => $request->fax_number,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'line' => $request->line,
            'established_date' => $request->established_date,
            'status' => $request->status,
        ]);

        if ($request->file('shop_photo_path')) {
            $file = $request->file('shop_photo_path');
            $folderName = 'shops';
            $fileNameToStore = ImageService::uploadMiddleThumbnail($file, $folderName);
            $shop->shop_photo_path = $fileNameToStore;
        }

        if ($request->file('shop_logo_path')) {
            $file = $request->file('shop_logo_path');
            $folderName = 'shop_logos';
            $fileNameToStore = ImageService::uploadLogo($file, $folderName);
            $shop->shop_logo_path = $fileNameToStore;
        }

        $shop->save();

        $notification = array(
            'message' => '店舗の登録に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('owner.shop.index')->with($notification);
    }

    public function show(Shop $shop): View
    {
        $shop = Shop::findOrFail($shop->id);

        return view('admin.shop.show', compact('shop'));
    }

    public function edit(Shop $shop): View
    {
        $shop = Shop::findOrFail($shop->id);

        return view('admin.shop.edit', compact('shop'));
    }

    public function update(UpdateShopRequest $request, Shop $shop): RedirectResponse
    {
        $shop = Shop::findOrFail($shop->id);

        $shop->admin_id = $request->admin_id;
        $shop->name = $request->name;
        $shop->type = $request->type;
        $shop->description = $request->description;
        $shop->email = $request->email;
        $shop->zipcode = $request->zipcode;
        $shop->address1 = $request->address1;
        $shop->address2 = $request->address2;
        $shop->address3 = $request->address3;
        $shop->address4 = $request->address4;
        $shop->phone_number = $request->phone_number;
        $shop->fax_number = $request->fax_number;
        $shop->website = $request->website;
        $shop->facebook = $request->facebook;
        $shop->twitter = $request->twitter;
        $shop->instagram = $request->instagram;
        $shop->youtube = $request->youtube;
        $shop->line = $request->line;
        $shop->established_date = $request->established_date;
        $shop->status = $request->status;

        if ($request->file('shop_photo_path')) {
            $file = $request->file('shop_photo_path');
            $folderName = 'shops';
            $fileNameToStore = ImageService::uploadMiddleThumbnail($file, $folderName);
            $shop->shop_photo_path = $fileNameToStore;
        }

        if ($request->file('shop_logo_path')) {
            $file = $request->file('shop_logo_path');
            $folderName = 'shop_logos';
            $fileNameToStore = ImageService::uploadLogo($file, $folderName);
            $shop->shop_logo_path = $fileNameToStore;
        }

        $shop->save();

        $notification = array(
            'message' => '店舗の更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.shop.index')->with($notification);
    }

    public function destroy(Shop $shop): RedirectResponse
    {
        Shop::findOrFail($shop->id)->delete();

        $notification = array(
            'message' => '店舗の削除に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('owner.shop.index')->with($notification);
    }

    public function expiredIndex()
    {
        $expiredShop = Shop::onlyTrashed()->get();

        return view('admin.shop.expired', compact('expiredShop'));
    }

    public function expiredRestore($shop)
    {
        Shop::withTrashed()->findOrFail($shop->id)->restore();

        $notification = array(
            'message' => 'メニューの復元に成功しました。',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.expiredShop.index')->with($notification);
    }

    public function expiredDestroy($shop)
    {
        Shop::onlyTrashed()->findOrFail($shop->id)->forceDelete();

        $notification = array(
            'message' => 'メニューを完全に削除しました。',
            'alert-type' => 'danger'
        );

        return redirect()->route('admin.expiredShop.index')->with($notification);;
    }
}
