<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('evenement.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="Nom" class="block font-medium text-sm text-gray-700">{{ __('Titre de l\'évenement : ') }}</label>
            <textarea
                name="Nom"
                placeholder="{{ __('Titre de l\'évenement') }}"
                class="block full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('Nom') }}</textarea>
            <label for="Nom" class="block font-medium text-sm text-gray-700">{{ __('Description de l\'évenement :') }}</label>

            <textarea
                name="Evenement"
                placeholder="{{ __('Descrption de l\'évenement') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('Evenement') }}</textarea>

            <label for="Image" class="block font-medium text-sm text-gray-700">{{ __('Image de l\'évenement') }}</label>
            <input
                type="file"
                id="Image"
                name="Image"
                class="block w-full text-gray-700 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Enregistrer') }}</x-primary-button>
        </form>
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