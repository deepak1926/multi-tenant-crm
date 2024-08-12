
                    
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Interaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('interactions.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label for="details" :value="__('Details')" />
                            <x-text-input id="details" class="block mt-1 w-full" type="text" name="details" :value="old('details')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('details')" class="mt-2" />
                        </div>

                        <input type="hidden" name="client_id" value="{{$client_id}}">
                        <input type="hidden" name="tenant_id" value="{{auth()->user()->tenant_id}}">

                        <div class="flex items-center justify-end mt-4">
                            
                            
                            
                            <x-primary-button class="ms-4">
                                {{ __('Add Interaction') }}
                            </x-primary-button>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>