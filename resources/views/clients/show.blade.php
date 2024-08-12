<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $client->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div class="mb-4">
                        <p class="font-bold text-white">{{ __('Email') }}:</p>
                        <p class="font-bold text-white" >{{ $client->email }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-bold text-white">{{ __('Phone') }}:</p>
                        <p class="font-bold text-white">{{ $client->phone }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-bold text-white">{{ __('Address') }}:</p>
                        <p class="font-bold text-white">{{ $client->address }}</p>
                    </div>
                    <hr class="my-4 text-white">

                </div>
                <a href="{{ route('interactions.create', $client->id) }}" class="btn btn-primary mt-3 mb-3 inline-block px-4 py-2 bg-blue-500 text-white rounded">{{ __('Add Interaction') }}</a>
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Date') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Details') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($client->interactions as $interaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $interaction->created_at }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $interaction->details }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('interactions.edit', $interaction->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">{{ __('Edit') }}</a>
                                        <form action="{{ route('interactions.destroy', $interaction->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Delete') }}</button>
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
