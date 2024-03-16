<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Elhazmi Data') }}
        </h2>
    </x-slot>

    <div class="p-1 py-12 m-3 bg-white rounded">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @if (session()->has('status'))
                    <div
                        class="flex items-center justify-center px-2 py-1 m-1 font-medium text-white rounded-md
    @if (session('status_type') == 'success') bg-green-500
    @elseif(session('status_type') == 'danger') bg-red-500
    @else bg-yellow-500 @endif">
                        <div slot="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5 mx-2 feather feather-check-circle">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="flex-initial max-w-full text-xl font-normal">
                            {{ session('status') }}
                        </div>
                        <div class="flex flex-row-reverse flex-auto">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-green-400">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="p-6 text-gray-900">
                <div class="flex justify-end">
                    <x-primary-button class="bg-red-800">
                        <a href="{{ route('create') }}">{{ __('Add New Data') }}</a>
                    </x-primary-button>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-gray-200 border-b rounded-xl">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-gray-900">#</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                {{ __('Name') }}</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                {{ __('Email') }}</th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                {{ __('Created At') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $item)
                                            <tr
                                                class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                    {{ $loop->iteration }}</td>
                                                <td
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $item->name }}</td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                    {{ $item->email }}</td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                    {{ $item->created_at }}</td>
                                                <td>
                                                    <div>
                                                        <form action="{{ route('destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure you want to delete this item?')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M1.5 2.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5V4h-13v-.5zm13.354 1.354a.5.5 0 0 0-.708-.708L9.5 7.793 8.354 6.646a.5.5 0 1 0-.708.708L8.793 8.5l-1.147 1.146a.5.5 0 1 0 .708.708L9.5 9.207l1.146 1.147a.5.5 0 0 0 .708-.708L10.207 8.5l1.147-1.146a.5.5 0 0 0 0-.708zM3 5v9a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5H3z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No data available.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
