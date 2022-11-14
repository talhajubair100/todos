<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

            
            <a href="{{ route('todos.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Todos
            </a>

            <a href="{{ route('categories.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Category
            </a>
        </h2>
    </x-slot>

                       <!-- component -->
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">All Active Todos</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Image</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Title</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Description</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Categories</div>
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach($todos as $todo)
                            <tr>
                               
                                    
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center"><img  src="{{
                                            url('storage/'.$todo->image)
                                        }}" width="60" height="40" alt="Alex Shatov"></div>
                                    </td>
                            
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-center">{{ $todo->title }}</div>
                                </td>

                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-center">{{ $todo->description }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-center font-medium text-green-500">{{ $todo->categories->name }}</div>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


</x-app-layout>
