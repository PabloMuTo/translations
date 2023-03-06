@extends('layouts.app')

@section('content')

    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow" >
                    <div class="flex">
                        <div class="p-4">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" wire:model="query" id="query" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                            </div>
                        </div>
                        <div class="p-4">
                            <select wire:model="group" id="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select a group</option>
                                @foreach ( $groups as $elementGroup )
                                    <option value="{{ $elementGroup['key'] }}">{{ $elementGroup['key'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{ $query }} | {{ $group }}

                    <div wire:loading>Loading</div>
                    <table class="divide-y divide-gray-300 ">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                NAME
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                GROUP
                            </th>
                            @foreach ( $acceptedLanguages as $lang )
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    {{ $lang }}
                                </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            @foreach( $locales as $locale )
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-xbold">
                                        {{ $locale['full_key'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">
                                            {{ $locale['group'] }}
                                        </div>
                                    </td>
                                    @foreach ( $acceptedLanguages as $keyLang => $valueLang )
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">{{ $valueLang }}</div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
