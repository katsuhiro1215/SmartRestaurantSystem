<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
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
                    <a href="{{ route('admin.shop.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Shop</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Create</span>
                </div>
            </li>
        </ol>
        <x-link-button name="index" href="{{ route('admin.shop.index') }}" />
    </x-slot>
    <div class="w-full mx-auto px-4 py-3 overflow-auto">
        <form method="POST" action="{{ route('admin.shop.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="w-full">
                <h2 class="text-lg">Shop</h2>
            </div>
            <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
            <x-grid>
                <div class="mt-4 col-span-2">
                    <x-input-label for="image" :value="__('写真')" />
                    <x-text-input id="image" name="shop_photo_path" type="file" class="mt-1 block w-full"
                        :value="old('shop_photo_path')" />
                    <img id="showImage"
                        src="{{ !empty($shop->shop_photo_path) ? url('storage/shops/' . $shop->shop_photo_path) : url('upload/no-image.png') }}"
                        alt="" class="rounded-full w-56 h-56 shadow">
                    <x-input-error class="mt-2" :messages="$errors->get('shop_photo_path')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="image" :value="__('ロゴ')" />
                    <x-text-input id="image2" name="shop_logo_path" type="file" class="mt-1 block w-full"
                        :value="old('shop_logo_path')" />
                    <img id="showImage2"
                        src="{{ !empty($shop->shop_logo_path) ? url('storage/shop_logos/' . $shop->shop_logo_path) : url('upload/no-image.png') }}"
                        alt="" class="rounded-full w-56 h-56 shadow">
                    <x-input-error class="mt-2" :messages="$errors->get('shop_logo_path')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="name" :value="__('店舗名')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name')" required autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="type" :value="__('店舗タイプ')" />
                    <x-text-input id="type" name="type" type="text" class="mt-1 block w-full"
                        :value="old('type')" />
                    <x-input-error class="mt-2" :messages="$errors->get('type')" />
                </div>
                <div class="mt-4 col-span-4">
                    <x-input-label for="description" :value="__('店舗概要')" />
                    <x-textarea rows="5" name="description" />
                </div>
                <div class="mt-4">
                    <x-input-label for="zipcode" :value="__('郵便番号')" />
                    <x-text-input id="zipcode" name="zipcode" type="text" class="mt-1 block w-full"
                        :value="old('zipcode')" autocomplete="zipcode" />
                    <x-input-error class="mt-2" :messages="$errors->get('zipcode')" />
                    <p id="error" class="text-red-500 text-sm mt-2"></p>
                </div>
                <div class="mt-4">
                    <x-input-label for="zipcode" :value="__('検索')" />
                    <x-primary-button id="search" name="search" />
                </div>
                <div class="mt-4">
                    <x-input-label for="address1" :value="__('都道府県名')" />
                    <x-text-input id="address1" name="address1" type="text" class="mt-1 block w-full"
                        :value="old('address1')" autocomplete="address1" placeholder="都道府県名を入力してください。" />
                    <x-input-error class="mt-2" :messages="$errors->get('address1')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="address2" :value="__('市区町村名')" />
                    <x-text-input id="address2" name="address2" type="text" class="mt-1 block w-full"
                        :value="old('address2')" autocomplete="address2" placeholder="市区町村名を入力してください。" />
                    <x-input-error class="mt-2" :messages="$errors->get('address2')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="address3" :value="__('地域名')" />
                    <x-text-input id="address3" name="address3" type="text" class="mt-1 block w-full"
                        :value="old('address3')" autocomplete="address3" placeholder="地域名を入力してください。" />
                    <x-input-error class="mt-2" :messages="$errors->get('address3')" />
                </div>
                <div class="mt-4 col-span-3">
                    <x-input-label for="address4" :value="__('それ以降')" />
                    <x-text-input id="address4" name="address4" type="text" class="mt-1 block w-full"
                        :value="old('address4')" autocomplete="address4" placeholder="それ以降を入力してください。" />
                    <x-input-error class="mt-2" :messages="$errors->get('address4')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="email" :value="__('メールアドレス')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email')" required autocomplete="email" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="phone_number" :value="__('電話番号')" />
                    <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
                        :value="old('phone_number')" required autocomplete="phone_number" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="fax_number" :value="__('FAX番号')" />
                    <x-text-input id="fax_number" name="fax_number" type="text" class="mt-1 block w-full"
                        :value="old('fax_number')" />
                    <x-input-error class="mt-2" :messages="$errors->get('fax_number')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="website" :value="__('Website')" />
                    <x-text-input id="website" name="website" type="text" class="mt-1 block w-full"
                        :value="old('website')" placeholder="URL" />
                    <x-input-error class="mt-2" :messages="$errors->get('website')" />
                </div>
                <div class="mt-4 col-span-2">
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="facebook" :value="__('Facebook')" />
                    <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full"
                        :value="old('facebook')" placeholder="URL" />
                    <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="twitter" :value="__('Twitter')" />
                    <x-text-input id="twitter" name="twitter" type="text" class="mt-1 block w-full"
                        :value="old('twitter')" placeholder="URL" />
                    <x-input-error class="mt-2" :messages="$errors->get('twitter')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="instagram" :value="__('Instagram')" />
                    <x-text-input id="instagram" name="instagram" type="text" class="mt-1 block w-full"
                        :value="old('instagram')" placeholder="URL" />
                    <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="youtube" :value="__('Youtube')" />
                    <x-text-input id="youtube" name="youtube" type="text" class="mt-1 block w-full"
                        :value="old('youtube')" placeholder="URL" />
                    <x-input-error class="mt-2" :messages="$errors->get('youtube')" />
                </div>
                <div class="mt-4 col-span-2">
                    <x-input-label for="line" :value="__('Line')" />
                    <x-text-input id="line" name="line" type="text" class="mt-1 block w-full"
                        :value="old('line')" placeholder="URL" />
                    <x-input-error class="mt-2" :messages="$errors->get('line')" />
                </div>
                <div class="mt-4 col-span-2">
                </div>
                <div class="mt-4">
                    <x-input-label for="status" :value="__('ステータス')" />
                    <div class="flex">
                        <div class="flex items-center mr-4">
                            <x-radio-input id="active" name="status" value="1" checked />
                            <x-radio-label for="active" :value="__('利用中')" />
                        </div>
                        <div class="flex items-center mr-4">
                            <x-radio-input id="inactive" name="status" value="0" />
                            <x-radio-label for="inactive" :value="__('停止中')" />
                        </div>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="established_date" :value="__('設立日')" />
                    <x-text-input id="established_date" name="established_date" type="date" class="mt-1 block w-full"
                        :value="old('established_date')" autocomplete="established_date" placeholder="Date" />
                    <x-input-error class="mt-2" :messages="$errors->get('established_date')" />
                </div>
            </x-grid>
            <div class="mt-4">
                <x-submit-button name="store" />
            </div>
        </form>
    </div>
</x-app-layout>
