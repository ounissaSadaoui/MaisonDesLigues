<x-app-layout>
    <div class="body-bg" style="background-image: url('/images/paris-jo2024-1200x800.jpg');">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: fit-content;">
                    <div class="p-4 text-gray-900 text-5xl" style="background-color: #F5C000ff;">
                        {{ __("Page d'administration :") }}
                    </div>
                    
                </div>            
            </div>
            <div class="m-auto mt-4 mb-4 mr-8 flex flex-col items-end" style="width: 20rem;">
                <a href="#connexion" class="block mb-2 bg-green-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded w-full text-center">
                    Gérer les Posts
                </a>
                <a href="{{ route('admin.users.index') }}"  class="block mb-2 bg-green-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded w-full text-center">
                    Gérer les inscrits
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
    <div id="evenements" class="mt-6 bg-white shadow-sm rounded-lg">
        <form action="{{ route('evenement.bulk-delete') }}" method="POST">
            @csrf
            @method('DELETE')
    
            <div class="grid-container">
                @foreach ($evenements as $evenement)
                    <div class="event-item">
                        <input type="checkbox" name="selected_evenements[]" value="{{ $evenement->id }}">
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
                        <div class="event-date">
                            <small>{{ $evenement->created_at->format('j M Y, g:i a') }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#"  class="block m-auto mb-4 bg-red-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded w-full text-center" style="width: 20rem; text-align: center">

            <button type="submit">Supprimer les événements sélectionnés</button>
            </a>
        </form>
    </div>
    

</x-app-layout>
