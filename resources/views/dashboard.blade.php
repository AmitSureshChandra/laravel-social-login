<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="text-center p-6 bg-white border-b border-gray-200">--}}
{{--                    <h3 class="lead">Products</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <h1 class="lead text-center mt-4"> Products </h1>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
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
                        <tr>
                            @foreach($products as $key =>  $product)
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{  $product->category->name }}</td>
                                <td>{{  $product->name }}</td>
                                <td>{{  $product->price }}</td>
                                <td>{{  $product->size }}</td>
                                <td>{{  $product->stock }}</td>
                                <td>{{  $product->description }}</td>
                                <td>
                                    <form class="inline" action="/products/{{ $product->id }}/edit" method="post">
                                        @csrf
                                        <input type="submit" class="text-primary" value="Edit">
                                    </form>

                                    <form class="inline" action="/products/{{ $product->id }}/delete">
                                        @csrf
                                        <input type="submit" class="text-danger" value="Delete">
                                    </form>
                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
