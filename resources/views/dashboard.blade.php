<x-app-layout>
    <div class="body-bg" style="background-image: url('/images/joparis2024.jpeg');">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                    <div class="p-4 text-gray-900 text-4xl" style="background-color: #F5C000ff">
                        {{ __("Prêt(e) pour la compétition ? Cliquez sur le bouton pour commencer ! ") }}
                    </div>
                    <div class="p-6 text-black-600 text-2xl" style="background-color: #F5C000ff">
                        {{ __("Tous les mois, profitez de toutes les nouveautés et de toutes les opportunités !
Dès le mois prochain, nous vous proposons tous les événements sportifs sur vos supports préférés.  ") }}
                    </div>
                </div>            
            </div>
            <div class="ml-auto mt-4 mr-8 flex flex-col items-end" style="width: 20rem;">
                <a href="#connexion" class="block mb-2 bg-red-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded w-full text-center">
                    Voir les évenements
                </a>
                <a href="{{ route('evenement.create') }}"  class="block bg-red-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded w-full text-center">
                    Publier un évenement
                </a>
            </div>
        </div>
    </div>
    <div class="header-bg" id="connexion" style="background-color: #F5C000ff">
        {{ __("Liste des évenements :") }}
    </div>
    <div id="evenements" class="mt-6 bg-white shadow-sm rounded-lg">
        <div class="grid-container">
            @foreach ($evenements as $evenement)
                <div class="event-item">
                    <div class="event-title">
                        {{ $evenement->Nom.' ('.$evenement->user->name.')' }}
                    </div>
                    <div class="event-image">
                        @if ($evenement->Image)
                            <img src="{{ asset('storage/' . $evenement->Image) }}" alt="Image de l'événement">
                        @endif
                    </div>
                    <div class="event-description">
                        {{ $evenement->Evenement }}
                    </div>
                    <div class="event-note">
                        {{ $evenement->note }}
                    </div>
                    <div class="event-date">
                        <small>{{ $evenement->created_at->format('j M Y, g:i a') }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--
    <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">
            S'inscrire
        </button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Se connecter
        </button>
    </div>-->
</x-app-layout>
