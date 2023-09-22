<x-app-layout>
    <x-slot name="header">
        {{ __('管理者詳細') }}
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('owner.dashboard') }}"
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
                    <a href="{{ route('owner.admin.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Admin</a>
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
        <x-link-button name="index" href="{{ route('owner.admin.index') }}" />
    </x-slot>

    <x-grid>
        <div class="bg-green-300 border border-red-300 rounded px-4 py-3 col-span-1 sm:col-span-2 md:col-span-1">
            <h2 class="text-lg">Profile</h2>

            <div class="mt-4">
                <img src="{{ !empty($adminProfile->admin_photo_path) ? url('storage/admins/' . $adminProfile->admin_photo_path) : url('upload/kids.jpg') }}"
                    alt="" class="rounded-full w-36 h-36 mx-auto">
            </div>
            <div class="mt-4 text-center">
                <h3>名前: {{ $adminProfile->full_name }}</h3>
            </div>
            <div class="mt-4 text-center">
                <x-link-button name="profileEdit" href="{{ route('owner.adminProfile.edit', ['admin' => $admin->id, 'adminProfile' => $admin->adminProfile->id]) }}" />
                <x-link-button name="edit" href="{{ route('owner.admin.edit', ['admin' => $admin->id]) }}" />
            </div>
        </div>
        <div class="rounded px-4 py-3 col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 shadow-lg shadow-lime-500">
            <div class="inline-flex rounded-md shadow-sm px-4 py-3" role="group">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    Profile
                </button>
                <button type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                    </svg>
                    Settings
                </button>
                <button type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                        <path
                            d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                    </svg>
                    Downloads
                </button>
            </div>
            <div class="tab-panel px-4 py-3">
                <div class="mt-4">
                    <h3>基本情報</h3>
                </div>
                <div class="mt-4 overflow-hidden">
                    <x-user-table>
                        <tbody class="divide-y divide-red-200">
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">名前</th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    <span class="text-sm text-gray-400 mr-2">姓:</span>{{ $adminProfile->lastname }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    <span class="text-sm text-gray-400 mr-2">名:</span>{{ $adminProfile->firstname }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">フリガナ
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    <span
                                        class="text-sm text-gray-400 mr-2">セイ:</span>{{ $adminProfile->lastname_kana }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    <span
                                        class="text-sm text-gray-400 mr-2">メイ:</span>{{ $adminProfile->firstname_kana }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">生年月日
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    <span class="text-sm text-gray-400 mr-2">生年月日:</span>{{ $adminProfile->birth }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    <span class="text-sm text-gray-400 mr-2">年齢:</span>{{ $age }}歳
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">性別
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->gender }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">郵便番号
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    {{ $adminProfile->zipcode }}</td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left"></td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">住所</th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    <span
                                        class="text-sm text-gray-400 mr-2">都道府県名:</span>{{ $adminProfile->address1 }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                    <span
                                        class="text-sm text-gray-400 mr-2">市区町村名:</span>{{ $adminProfile->address2 }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left"></th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    <span class="text-sm text-gray-400 mr-2">地域名:</span>{{ $adminProfile->address3 }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left"></th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->address4 }}</td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">電話番号
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->phone_number }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">FAX番号
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->fax_number }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">Website
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->website }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">
                                    Facebook
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->facebook }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">
                                    instagram
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->instagram }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">youtube
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->youtube }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">line
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->line }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">ステータス
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->status }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">権限
                                </th>
                                <td class="border border-slate-300 px-4 py-3 font-medium text-left" colspan="2">
                                    {{ $adminProfile->role }}
                                </td>
                            </tr>
                        </tbody>
                    </x-user-table>
                </div>
                <div class="mt-4">
                    <h3>認証情報</h3>
                    <div class="mt-4 overflow-hidden">
                        <table class="table-auto border-collapse min-w-full divide-y divide-red-200">
                            <tbody class="divide-y divide-red-200">
                                <tr>
                                    <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">
                                        メールアドレス</th>
                                    <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                        {{ $admin->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border border-slate-300 bg-gray-100 px-4 py-3 font-medium text-left">
                                        パスワード
                                    </th>
                                    <td class="border border-slate-300 px-4 py-3 font-medium text-left">
                                        パスワードは表示できません。
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-grid>

</x-app-layout>
