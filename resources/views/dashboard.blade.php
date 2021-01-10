<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products Lists') }}
            <a href="/products/add" class=" inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">New</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table responsive">
                        <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Size</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $key =>  $product)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{  $product->category->name }}</td>
                                    <td>{{  $product->name }}</td>
                                    <td>{{  $product->price }}</td>
                                    <td>{{  $product->size }}</td>
                                    <td>{{  $product->stock }}</td>
                                    <td>{{  $product->description }}</td>
                                    <td>
                                        <form class="inline" action="/products/{{ $product->id }}/edit" method="get">
                                            @csrf
                                            <input type="submit" class="text-primary" value="Edit">
                                        </form>

                                        <form class="inline" action="/products/{{ $product->id }}/delete" method="post">
                                            @csrf
                                            <input type="submit" class="text-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
