<x-app-layout>
  <x-slot name="header">
      {{ __('Employee Profile') }}
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
                  <a href="{{ route('admin.employee.index') }}"
                      class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Employee</a>
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
      <x-link-button name="index" href="{{ route('admin.employee.index') }}" />
  </x-slot>
  <div class="w-full mx-auto px-4 py-3 overflow-auto">
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
      <form method="POST" action="{{ route('admin.employeeProfile.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="w-full">
              <h2 class="text-lg">Profile</h2>
          </div>
          <input type="hidden" name="employee_id" value="{{ $employee->id }}">
          <x-grid>
              <div class="mt-4 col-span-2 row-span-3">
                  <x-input-label for="image" :value="__('写真')" />
                  <x-text-input id="image" name="employee_photo_path" type="file" class="mt-1 block w-full"
                      :value="old('employee_photo_path')" />
                  <img id="showImage"
                      src="{{ !empty($employeeProfile->employee_photo_path) ? url('storage/employees/' . $employeeProfile->employee_photo_path) : url('upload/employees.jpg') }}"
                      alt="" class="rounded-full w-56 h-56 shadow">
                  <x-input-error class="mt-2" :messages="$errors->get('employee_photo_path')" />
              </div>
              <div class="mt-4 col-span-1">
                  <x-input-label for="lastname" :value="__('名前(姓)')" />
                  <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full"
                      :value="old('lastname')" required />
                  <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
              </div>
              <div class="mt-4 col-span-1">
                  <x-input-label for="firstname" :value="__('名前(名)')" />
                  <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full"
                      :value="old('firstname')" required />
                  <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
              </div>
              <div class="mt-4 col-span-1">
                  <x-input-label for="lastname_kana" :value="__('フリガナ(セイ)')" />
                  <x-text-input id="lastname_kana" name="lastname_kana" type="text" class="mt-1 block w-full"
                      :value="old('lastname_kana')" required />
                  <x-input-error class="mt-2" :messages="$errors->get('lastname_kana')" />
              </div>
              <div class="mt-4 col-span-1">
                  <x-input-label for="firstname_kana" :value="__('フリガナ(メイ)')" />
                  <x-text-input id="firstname_kana" name="firstname_kana" type="text" class="mt-1 block w-full"
                      :value="old('firstname_kana')" required />
                  <x-input-error class="mt-2" :messages="$errors->get('firstname_kana')" />
              </div>
              <div class="mt-4">
                  <x-input-label for="birth" :value="__('生年月日')" />
                  <x-text-input id="birth" name="birth" type="date" class="mt-1 block w-full"
                      :value="old('birth')" autocomplete="birth" />
                  <x-input-error class="mt-2" :messages="$errors->get('birth')" />
              </div>
              <div class="mt-4">
                  <x-input-label for="gender" :value="__('性別')" />
                  <div class="flex">
                      <div class="flex items-center mr-4">
                          <x-radio-input id="male" name="gender" value="{{ old('gender') }}" checked />
                          <x-radio-label for="male" :value="__('男性')" />
                      </div>
                      <div class="flex items-center mr-4">
                          <x-radio-input id="female" name="gender" value="{{ old('gender') }}" />
                          <x-radio-label for="female" :value="__('女性')" />
                      </div>
                      <div class="flex items-center mr-4">
                          <x-radio-input id="others" name="gender" value="{{ old('gender') }}" />
                          <x-radio-label for="others" :value="__('その他')" />
                      </div>
                  </div>
                  <x-input-error class="mt-2" :messages="$errors->get('gender')" />
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
              <div class="mt-4">
                  <x-input-label for="phone_number" :value="__('電話番号')" />
                  <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
                      :value="old('phone_number')" autocomplete="phone_number" placeholder="電話番号を入力してください。" />
                  <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
              </div>
              <div class="mt-4"></div>
              <div class="mt-4"></div>
              <div class="mt-4"></div>
              <div class="mt-4">
                  <x-input-label for="status" :value="__('ステータス')" />
                  <div class="flex">
                      <div class="flex items-center mr-4">
                          <x-radio-input id="active" name="status" value="status" checked />
                          <x-radio-label for="active" :value="__('利用中')" />
                      </div>
                      <div class="flex items-center mr-4">
                          <x-radio-input id="inactive" name="status" value="status" />
                          <x-radio-label for="inactive" :value="__('停止中')" />
                      </div>
                  </div>
                  <x-input-error class="mt-2" :messages="$errors->get('status')" />
              </div>
              <div class="mt-4 col-span-2">
                  <x-input-label for="role" :value="__('権限')" />
                  <div class="flex">
                      <div class="flex items-center mr-4">
                          <x-radio-input id="fullTime" name="role" value="正社員" checked />
                          <x-radio-label for="fullTime" :value="__('正社員')" />
                      </div>
                      <div class="flex items-center mr-4">
                          <x-radio-input id="partTime" name="role" value="パート" />
                          <x-radio-label for="partTime" :value="__('パート')" />
                      </div>
                      <div class="flex items-center mr-4">
                          <x-radio-input id="subPartTime" name="role" value="アルバイト" />
                          <x-radio-label for="subPartTime" :value="__('アルバイト')" />
                      </div>
                  </div>
                  <x-input-error class="mt-2" :messages="$errors->get('role')" />
              </div>
              <div class="mt-4">
                  <x-input-label for="start_date" :value="__('利用開始日')" />
                  <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full"
                      :value="old('start_date', date('Y-m-d'))" autocomplete="start_date" placeholder="Date" />
                  <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
              </div>
          </x-grid>
          <div class="mt-4">
              <x-submit-button name="store" />
          </div>
      </form>
  </div>
</x-app-layout>
