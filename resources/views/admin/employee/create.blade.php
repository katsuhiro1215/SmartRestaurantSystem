<x-app-layout>
  <x-slot name="header">
      {{ __('Employee') }}
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
      <form method="POST" action="{{ route('admin.employee.store') }}">
          @csrf
          <div class="w-full">
              <h2 class="text-lg">Auth</h2>
          </div>
          <div class="w-1/3">
              <div class="mt-4">
                  <x-input-label for="email" :value="__('Email')" />
                  <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                      :value="old('email')" required autocomplete="username" />
                  <x-input-error class="mt-2" :messages="$errors->get('email')" />
              </div>
              <div class="mt-4">
                  <x-input-label for="password" :value="__('Password')" />
                  <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                      autocomplete="current-password" />
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
              <div class="mt-4">
                  <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                  <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                      name="password_confirmation" required autocomplete="new-password" />
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>
          </div>
          <div class="mt-4">
              <x-submit-button name="store" />
          </div>
      </form>
  </div>

</x-app-layout>
