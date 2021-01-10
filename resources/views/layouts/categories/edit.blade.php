<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" >
                    <form method="POST" action="/categories/{{ $category->id }}" class="">
                        @csrf
                        <x-label for="name" :value="__('Product Name')" />

                        <x-input id="name" class="inline mt-1"
                                 type="text"
                                 name="name"
                                 value="{{ $category->name }}"
                                 required />

                        <x-label for="display_name" :value="__('Display Name')" />

                        <x-input id="display_name" class="inline mt-1"
                                 type="text"
                                 value="{{ $category->display_name }}"
                                 name="display_name"
                                 required />

                        <x-button class="ml-3  inline">
                            {{ __('Update') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>



