<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Reviews') }}
            <a href="{{  url()->previous() }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 float-right">Back</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-9">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                        <!-- Author Name -->
                        <div>
                           Book Name:  {{$books->name}}
                        </div>
                        <div>
                           Author Name:  {{$books->authors->pluck('name')->implode(',')}}
                            
                        </div>
                        <div class="mt-3">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
            {{ __('Book Reviews') }} </h2>
                                @foreach($review as $reviews)
                                   <div>
                                   {{$loop->iteration}} -   {{$reviews->review}} 
                                    </div>
                                @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>