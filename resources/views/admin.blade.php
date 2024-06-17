<x-app-layout>
    <x-slot name="header">
        <div class="header-bg flex items-center">
            <img src="/images/olympic-games.png" alt="Icône" class="w-8 h-8 mr-2">
            {{ __('Maison des ligues: Tous les sports à portée de main !') }}
        </div>
    </x-slot>
    <div class="body-bg" style="background-image: url('/images/paris-jo2024-1200x800.jpg');">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #F5C000ff; width: fit-content;">
                    <div class="p-4 text-gray-900 text-5xl">
                        {{ __("Page d'administration :") }}
                    </div>
                    
                </div>            
            </div>
            <div class="m-auto mt-4 mb-4 mr-8 flex flex-col items-end" style="width: 20rem;">
                <a href="#connexion" class="block mb-2 bg-green-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded w-full text-center">
                    Gérer les inscrits
                </a>
                <a href="{{ route('evenement.create') }}"  class="block mb-2 bg-green-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded w-full text-center">
                    Gérer les posts
                </a>
                <a href="{{ route('evenement.create') }}"  class="block mb-2 bg-green-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded w-full text-center">
                    Publier un évenement
                </a>
            </div>
        </div>
    </div>
    <div class="header-bg mt-5" id="connexion">
        {{ __("Liste des évenements :") }}
    </div>
  
</x-app-layout>
