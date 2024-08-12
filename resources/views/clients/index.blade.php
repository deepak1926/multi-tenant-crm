<style>
    .table-custom {
        background-color: #f8f9fa;
        border-radius: 5px;
        overflow: hidden;
    }
    .table-custom th {
        background-color: #343a40;
        color: #fff;
        text-align: center;
    }
    .table-custom td {
        vertical-align: middle;
        text-align: center;
    }
    .table-custom .btn {
        margin: 0 5px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">{{ __('Add Client') }}</a>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Add this in the head section of your HTML if you need custom CSS -->
                        <!-- Table HTML -->
                        <table class="max-w-full divide-y divide-gray-200 table-custom" width="100%">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</th>
                                    <th class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">{{ __('Email') }}</th>
                                    <th class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">{{ __('Phone') }}</th>
                                    <th class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if(count($clients)>0)
                                @foreach($clients as $client)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->phone }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('clients.show', $client->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('View') }}</a>
                                            <br>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">{{ __('Edit') }}</a>
                                            <br>
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 whitespace-nowrap">No Records found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
