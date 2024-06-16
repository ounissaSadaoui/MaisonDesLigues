<x-app-layout>
    <x-slot name="header">
        <div class="header-bg flex items-center">
            <img src="/images/olympic-games.png" alt="Icône" class="w-8 h-8 mr-2">
            {{ __('Maison des ligues: Tous les sports à portée de main') }}
        </div>
    </x-slot>
    <div class="body-bg" style="background-image: url('/images/joparis2024.jpeg');">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #F5C000ff">
                    <div class="p-4 text-gray-900 text-4xl">
                        {{ __("Prêt(e) pour la compétition ? Cliquez sur le bouton pour commencer ! ") }}
                    </div>
                    <div class="p-6 text-black-600 text-2xl">
                        {{ __("Tous les mois, profitez de toutes les nouveautés et de toutes les opportunités !
Dès le mois prochain, nous vous proposons tous les événements sportifs sur vos supports préférés.  ") }}
                    </div>
                </div>            
            </div>
        </div>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($evenements as $evenement)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $evenement->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $evenement->created_at->format('j M Y, g:i a') }}</small>
                            </div>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $evenement->Nom }} :</p> 
                        <p class="mt-4 text text-gray-700">{{ $evenement->Evenement }}</p>
                        @if ($evenement->Image)
                            <div class="mt-4">
                                <img src="{{ asset('storage/' . $evenement->Image) }}" alt="Image de l'événement" class="w-full h-auto rounded-lg">
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
