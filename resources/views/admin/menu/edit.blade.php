<x-app-layout>
    <x-slot name="header">
        {{ __('Menu') }}
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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit</span>
                </div>
            </li>
        </ol>
        <x-link-button name="index" href="{{ route('admin.menu.index') }}" />
    </x-slot>

    <div class="w-full mx-auto px-4 py-3 overflow-auto">
        <form method="POST" action="{{ route('admin.menu.update', ['menu' => $menu->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="w-full">
                <h2 class="text-lg">Menu Edit</h2>
            </div>
            <x-grid>
                <div class="mt-4 col-span-2">
                    <div class="flex">
                        <x-input-label for="category_name" :value="__('商品カテゴリー名(JA)')" />
                        <span class="text-red-500 font-bold text-sm ml-2">*必須</span>
                    </div>
                    <x-select-input name="menu_category_id">
                        <option selected="" disabled>カテゴリー名を選択してください。</option>
                        @foreach ($menuCategories as $menuCategory)
                            <option value="{{ $menuCategory->id }}">{{ $menuCategory->name }}
                            </option>
                        @endforeach
                    </x-select-input>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mt-4 col-span-1">
                    <div class="flex">
                        <x-input-label for="code" :value="__('商品コード')" />
                    </div>
                    <x-text-input id="code" class="block mt-1 w-full" name="code" type="text" :value="$menu->code"
                        placeholder="自動生成されます。" />
                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                </div>
                <div class="mt-4 col-span-1">
                    <div class="flex">
                        <x-input-label for="slug" :value="__('スラッグ')" />
                    </div>
                    <x-text-input id="slug" class="block mt-1 w-full" name="slug" type="text" :value="$menu->slug"
                        placeholder="自動生成されます。" />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
                <div class="mt-4 col-span-2">
                    <div class="flex">
                        <x-input-label for="name" :value="__('商品名(JA)')" /><span
                            class="text-red-500 font-bold text-sm ml-2">*必須</span>
                    </div>
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="$menu->name" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mt-4 col-span-2">
                    <div class="flex">
                        <x-input-label for="name_en" :value="__('商品名(EN)')" /><span
                            class="text-red-500 font-bold text-sm ml-2">*必須</span>
                    </div>
                    <x-text-input id="name_en" class="block mt-1 w-full" type="text" name="name_en"
                        :value="$menu->name_en" required />
                    <x-input-error :messages="$errors->get('name_en')" class="mt-2" />
                </div>
                <div class="col-span-2">
                    <div class="mt-4">
                        <div class="flex">
                            <x-input-label for="description" :value="__('商品概要(JA)')" /><span
                                class="text-red-500 font-bold text-sm ml-2">*必須</span>
                        </div>
                        <x-textarea name="description" rows="8">{{ $menu->description }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <div class="flex">
                            <x-input-label for="detail" :value="__('商品詳細(JA)')" /><span
                                class="text-red-500 font-bold text-sm ml-2">*必須</span>
                        </div>
                        <x-textarea name="detail" rows="8">{{ $menu->detail }}</x-textarea>
                        <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="mt-4">
                        <div class="flex">
                            <x-input-label for="description_en" :value="__('商品概要(EN)')" /><span
                                class="text-red-500 font-bold text-sm ml-2">*必須</span>
                        </div>
                        <x-textarea name="description_en" rows="8">{{ $menu->description_en }}</x-textarea>
                        <x-input-error :messages="$errors->get('description_en')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <div class="flex">
                            <x-input-label for="detail_en" :value="__('商品詳細(EN)')" /><span
                                class="text-red-500 font-bold text-sm ml-2">*必須</span>
                        </div>
                        <x-textarea name="detail_en" rows="8">{{ $menu->detail_en }}</x-textarea>
                        <x-input-error :messages="$errors->get('detail_en')" class="mt-2" />
                    </div>
                </div>
                <div class="mt-4">
                    <x-input-label for="image" :value="__('写真')" />
                    <img id="showImage"
                        src="{{ !empty($menu->menu_photo_path) ? url('storage/menus/' . $menu->menu_photo_path) : url('upload/no-image.png') }}"
                        alt="" class="w-full shadow object-cover">
                    <x-text-input id="image" name="menu_photo_path" type="file" class="mt-4 block w-full"
                        :value="$menu->menu_photo_path" />
                    <x-input-error class="mt-2" :messages="$errors->get('menu_photo_path')" />
                </div>
                <div class="col-span-1">
                    <div class="mt-4">
                        <div class="flex">
                            <x-input-label for="selling_price" :value="__('定価')" /><span
                                class="text-red-500 font-bold text-sm ml-2">*必須</span>
                        </div>
                        <x-text-input id="selling_price" class="block mt-1 w-full" type="integer"
                            name="selling_price" :value="$menu->selling_price" required />
                        <x-input-error :messages="$errors->get('selling_price')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="discount_price" :value="__('割引価格')" />
                        <x-text-input id="discount_price" class="block mt-1 w-full" type="integer"
                            name="discount_price" :value="$menu->discount_price" required />
                        <x-input-error :messages="$errors->get('discount_price')" class="mt-2" />
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="mt-4">
                        <x-input-label for="hot_deals" :value="__('Hot Deals')" />
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <x-radio-input id="approve" name="hot_deals" value="1" checked />
                                <x-radio-label for="approve" :value="__('適応中')" />
                            </div>
                            <div class="flex items-center mr-4">
                                <x-radio-input id="pending" name="hot_deals" value="0" />
                                <x-radio-label for="pending" :value="__('停止中')" />
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('hot_deals')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="featured" :value="__('Featured')" />
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <x-radio-input id="approve" name="featured" value="1" checked />
                                <x-radio-label for="approve" :value="__('適応中')" />
                            </div>
                            <div class="flex items-center mr-4">
                                <x-radio-input id="pending" name="featured" value="0" />
                                <x-radio-label for="pending" :value="__('停止中')" />
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="special_offer" :value="__('Special Offer')" />
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <x-radio-input id="approve" name="special_offer" value="1" checked />
                                <x-radio-label for="approve" :value="__('適応中')" />
                            </div>
                            <div class="flex items-center mr-4">
                                <x-radio-input id="pending" name="special_offer" value="0" />
                                <x-radio-label for="pending" :value="__('停止中')" />
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('special_offer')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="special_deals" :value="__('Special Deals')" />
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <x-radio-input id="approve" name="special_deals" value="1" checked />
                                <x-radio-label for="approve" :value="__('適応中')" />
                            </div>
                            <div class="flex items-center mr-4">
                                <x-radio-input id="pending" name="special_deals" value="0" />
                                <x-radio-label for="pending" :value="__('停止中')" />
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('special_deals')" class="mt-2" />
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="mt-4">
                        <div class="flex">
                            <x-input-label for="status" :value="__('ステータス')" /><span
                                class="text-red-500 font-bold text-sm ml-2">*必須</span>
                        </div>
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
                </div>
            </x-grid>
            <div class="mt-4">
                <x-submit-button name="update" />
            </div>
        </form>
    </div>

</x-app-layout>
