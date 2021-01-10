<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/products">
                    @csrf
                        <div class="row">
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
                                <x-label for="name" :value="__('Product Name')" />

                                <x-input id="name" class="block mt-1 w-full"
                                         type="text"
                                         name="name"
                                         required />
                            </div>

                            <div class="col col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
                                <x-label for="category" :value="__('Category')" />

                                <select id="category" class="block mt-1 w-full"
                                        name="category_id"
                                        required >
                                    <option disabled>Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
                                <x-label for="price" :value="__('Price')" />

                                <x-input id="price" class="block mt-1 w-full"
                                         type="number"
                                         name="price"
                                         required />
                            </div>

                            <div class="col col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
                                <x-label for="size" :value="__('Size')" />

                                <x-input id="size" class="block mt-1 w-full"
                                         type="number"
                                         name="size"
                                         required />
                            </div>

                            <div class="col col-12 col-sm-6 col-md-4 col-lg-3 mt-3">
                                <x-label for="stock" :value="__('Stock')" />

                                <x-input id="stock" class="block mt-1 w-full"
                                         type="number"
                                         name="stock"
                                         required />
                            </div>
                        </div>


                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <textarea id="description" class="block mt-1 w-full"
                                     value=""
                                     name="description"
                                     required >
                            </textarea>
                        </div>



                        <div class="flex items-center justify-end mt-4">


                            <x-button class="ml-3">
                                {{ __('Add') }}
                            </x-button>

                        </div>

{{--                        <div>--}}
{{--                            <a href="/products" class="float-right mt-3 inline-flex items-center px-4 py-2 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">All Products</a>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <a href="/dashboard" class="float-right mt-3 inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Home</a>--}}
{{--                        </div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>



