<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeShopRequest;
use App\Http\Requests\UpdateEmployeeShopRequest;
use App\Models\Employee;
use App\Models\EmployeeShop;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function create(): View
    {
        $employee = Employee::select('id');
        $shop = Shop::select('id');

        $employeeShops = EmployeeShop::whereHas('shop', function ($query) use ($shop) {
            $query->whereIn('id', $shop->pluck('id'));
        })->with('employee')->paginate(20);

        return view('admin.assign.employeeShop.create', compact('employeeShops', 'employee', 'shop'));
    }

    public function store(StoreEmployeeShopRequest $request): RedirectResponse
    {
        $employeeId = $request->input('employee_id');
        $shopId = $request->input('shop_id');

        $employee = Employee::findOrFail($employeeId);
        $shop = Shop::findOrFail($shopId);

        $existingRelation = EmployeeShop::where('employee_id', $employee->id)
            ->where('shop_id', $shop->id)
            ->exists();

        if ($existingRelation) {
            $notification = [
                'message' => 'すでに登録されています。',
                'status' => 'warning'
            ];

            return redirect()->back()->with($notification);
        } else {
            EmployeeShop::create([
                'employee_id' => $employee->id,
                'shop_id' => $shop->id,
            ]);

            $notification = [
                'message' => '登録に成功しました。',
                'status' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function edit(EmployeeShop $employeeShop): View
    {
        $employees = Employee::select('id');
        $shops = Shop::select('id');

        $employeeShop = EmployeeShop::findOrFail($employeeShop->id);

        return view('admin.assign.employeeShop.edit', compact('employeeShops', 'employees', 'shops'));
    }

    public function update(UpdateEmployeeShopRequest $request, EmployeeShop $employeeShop): RedirectResponse
    {
        $employeeShop = EmployeeShop::findOrFail($employeeShop->id);

        $employeeId = $request->input('employee_id');
        $shopId = $request->input('shop_id');

        $employee = Employee::findOrFail($employeeId);
        $shop = Shop::findOrFail($shopId);

        $existingRelation = EmployeeShop::where('employee_id', $employee->id)
            ->where('shop_id', $shop->id)
            ->where('id', '!=', $employeeShop->id)
            ->first();

        if (!$existingRelation) {
            $employeeShop->update([
                'employee_id' => $employee->id,
                'shop_id' => $shop->id,
            ]);

            $notification = [
                'message' => '更新に成功しました。',
                'alert-type' => 'success'
            ];

            return redirect()->route('admin.employeeShop.create')->with($notification);
        } else {

            $notification = [
                'message' => '指定された従業員と店舗の組み合わせはすでに存在します。',
                'alert-type' => 'warning'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function destroy(EmployeeShop $employeeShop): RedirectResponse
    {
        EmployeeShop::findOrFail($employeeShop->id)->delete();

        $notification = array(
            'message' => '削除に成功しました。',
            'status' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
