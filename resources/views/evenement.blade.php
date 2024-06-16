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
    </div>
    
</x-app-layout>