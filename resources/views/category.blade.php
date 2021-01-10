<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Lists') }}
            <a href="/categories/add" class=" inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">New</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Display Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $key =>  $category)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{  $category->name }}</td>
                                <td>{{  $category->display_name }}</td>
                                <td>
                                    <form class="inline" action="/categories/{{ $category->id }}/edit" method="get">
                                        @csrf
                                        <input type="submit" class="text-primary" value="Edit">
                                    </form>

                                    <form class="inline" action="/categories/{{ $category->id }}/delete" method="post">
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
