<x-app-layout>
  <x-slot name="header">
      {{ __('Employee') }}
  </x-slot>
  <x-slot name="breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
              <a href="#"
                  class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                  <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                      viewBox="0 0 20 20">
                      <path
                          d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                  </svg>
                  Home
              </a>
          </li>
          <li aria-current="page">
              <div class="flex items-center">
                  <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                      fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 9 4-4-4-4" />
                  </svg>
                  <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Employee</span>
              </div>
          </li>
      </ol>
      <x-link-button name="index" href="{{ route('admin.employee.index') }}" />
  </x-slot>
  <div class="w-full mx-auto px-4 py-3 overflow-auto">
      <x-user-table>
          <thead>
              <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                      SL</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                      Name</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                      Employee Role</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                      Email</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                      Status</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                      Last Login</th>
                  <th
                      class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-center">
                      Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($expiredEmployee as $key => $employee)
                  <tr>
                      <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                          {{ $key + 1 }}</td>
                      <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 flex items-center">
                          @if ($employee->employeeProfile)
                              <img src="{{ !empty($employee->employeeProfile->employee_photo_path) ? url('storage/employees/' . $employee->employeeProfile->employee_photo_path) : url('upload/kids.jpg') }}"
                                  alt="" class="w-12 h-12 rounded-full mr-2">
                              <span>{{ $employee->employeeProfile->full_name }}</span>
                          @endif
                      </td>
                      <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                          @if ($employee->employeeProfile)
                              {{ $employee->employeeProfile->role }}
                          @endif
                      </td>
                      <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                          {{ $employee->email }}
                      </td>
                      <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">
                          @if ($employee->employeeProfile)
                              @if ($employee->employeeProfile->status === '利用中')
                                  <x-badge name="active" />
                              @else
                                  <x-badge name="inactive" />
                              @endif
                          @else
                              <x-badge name="inactive" />
                          @endif
                      </td>
                      <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 text-lg text-gray-900">
                          @if ($employee->employeeProfile)
                              {{ $employee->employeeProfile->last_login_at }}
                          @endif
                      </td>
                      <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 text-center">
                          <form method="POST" action="{{ route('admin.employee.destroy', ['employee' => $employee->id]) }}"
                              class="inline">
                              @csrf
                              @method('delete')
                              <x-submit-button id="delete" name="delete" />
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </x-user-table>
  </div>
</x-app-layout>
