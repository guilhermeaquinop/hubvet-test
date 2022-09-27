<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sectors') }}
        </h2>
    </x-slot>

    @if(session('successfulRegistration'))
        @include('components.alert-sucessful')
    @endif

    @if(session('successfulDelete'))
        @include('components.alert-danger')
    @endif

    @if($products)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs border-b text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Product Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Sector
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Bar Code
                            </th>
                        </tr>
                    </thead>
                    @foreach($products as $product)
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-400">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->name }}
                            </th>
                            <th class="py-4 px-6 flex">
                                <a href="/products/edit/{{ $product->id }}/ {{ $product->id_sector}}" class="font-medium mr-8 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="/products/{{ $product->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{$product->id_sector}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {!! DNS1D::getBarcodeHTML("$product->id", "C128") !!}
                            </th>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>