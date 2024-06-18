<x-app-layout>
    <div class="body-bg" style="background-image: url('/images/joparis2024.jpeg');">
    <div class="max-w-2xl mb-0 mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('evenement.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="Nom" class="mb-2 mt-2 block font-medium text-2xl text-black-800">{{ __('Titre de l\'évenement : ') }}</label>
            <textarea
                name="Nom"
                placeholder="{{ __('Titre de l\'évenement') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm custom-textarea"
            >{{ old('Nom') }}</textarea>

            <label for="Evenement" class="mb-2 mt-2 block font-medium text-2xl text-black-800">{{ __('Description de l\'évenement :') }}</label>
            <textarea
                name="Evenement"
                placeholder="{{ __('Description de l\'évenement') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm custom-textarea"
            >{{ old('Evenement') }}</textarea>

            <label for="note" class="mb-2 mt-2 block font-medium text-2xl text-black-800">{{ __('Commentaire de l\'évenement :') }}</label>
            <textarea
                name="note"
                placeholder="{{ __('Commentaire') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm custom-textarea"
            >{{ old('note') }}</textarea>

            <label for="Image" class="mb-2 mt-2 block font-medium text-2xl text-black-800">{{ __('Image de l\'évenement') }}</label>
            <input
                type="file"
                id="Image"
                name="Image"
                class="block w-full text-gray-700 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm custom-input"
            >
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button style="width: 10rem;" class=" mt-4 text-white block mb-2 bg-green-600 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded w-full text-center">{{ __('Enregistrer') }}</x-primary-button>
        </form>
    </div>
    </div>
    
</x-app-layout>