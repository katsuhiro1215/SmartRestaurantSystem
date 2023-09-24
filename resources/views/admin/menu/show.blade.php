<x-app-layout>
    <x-slot name="header">
        {{ __('Menu Detail') }}
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('admin.menu.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Menu</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Show</span>
                </div>
            </li>
        </ol>
        <x-link-button name="index" href="{{ route('admin.menu.index') }}" />
    </x-slot>

    <x-grid>
        <div class="bg-green-300 border border-red-300 rounded px-4 py-3 col-span-1 sm:col-span-2 md:col-span-1">
            <div class="w-full">
                <h2 class="text-lg">Menu</h2>
            </div>

            <div class="mt-4">
                <img src="{{ !empty($menu->menu_photo_path) ? url('storage/menus/' . $menu->menu_photo_path) : url('upload/no-image.png') }}"
                    alt="" class="rounded-full w-36 h-36 mx-auto">
            </div>
            <div class="mt-4 text-center">
                <h3>名前: {{ $menu->name }}</h3>
            </div>
            <div class="mt-4">
              <x-link-button name="edit" href="{{ route('admin.menu.edit', ['menu' => $menu->id]) }}" />
            </div>
        </div>
        <div class="rounded px-4 py-3 col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 shadow-lg shadow-lime-500">
            <div class="tab-panel px-4 py-3">
                <div class="mt-4">
                    <h3>基本情報</h3>
                </div>
                <div class="mt-4 overflow-hidden">
                    <x-user-table>
                        <tbody class="divide-y divide-red-200">
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">商品カテゴリー名</th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $menu->menuCategory->name }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">商品名</th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->name }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->name_en }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">商品概要
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->description }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->description_en }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">商品詳細
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->detail }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->detail_en }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">スラッグ
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->slug }}</td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left"></td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">商品コード
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->code }}</td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left"></td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">価格
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->selling_price }}円
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $menu->discount_price }}円
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">ステータス
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    @if ($menu->hot_deals === 1)
                                        <x-badge name="active">{{ '適用中' }}</x-badge>
                                    @else
                                        <x-badge name="inactive">{{ '停止中' }}</x-badge>
                                    @endif
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    @if ($menu->featured === 1)
                                        <x-badge name="active">{{ '適用中' }}</x-badge>
                                    @else
                                        <x-badge name="inactive">{{ '停止中' }}</x-badge>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left"></th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    @if ($menu->special_offer === 1)
                                        <x-badge name="active">{{ '適用中' }}</x-badge>
                                    @else
                                        <x-badge name="inactive">{{ '停止中' }}</x-badge>
                                    @endif
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    @if ($menu->special_deals === 1)
                                        <x-badge name="active">{{ '適用中' }}</x-badge>
                                    @else
                                        <x-badge name="inactive">{{ '停止中' }}</x-badge>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">ステータス
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    @if ($menu->status === 1)
                                        <x-badge name="active">{{ '適用中' }}</x-badge>
                                    @else
                                        <x-badge name="inactive">{{ '停止中' }}</x-badge>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </x-user-table>
                </div>
            </div>
        </div>
    </x-grid>

</x-app-layout>
