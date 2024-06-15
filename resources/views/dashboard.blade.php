<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maison des ligues: Tous les sports à portée de main') }}
        </h2>
    </x-slot>
    <div class="bg-cover bg-center bg-no-repeat" style="background-image: url('joparis2024.jpeg');">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    {{ __("Prêt(e) pour la compétition ? Cliquez sur le bouton pour commencer ! ") }}
                </div>
                <div class="p-6 text-black-600">
                    {{ __("Tous les mois, profitez de toutes les nouveautés et de toutes les opportunités !
Dès le mois prochain, nous vous proposons tous les événements sportifs sur vos supports préférés.  ") }}
                </div>
            </div>            
        </div>
        </div>
    </div>
    
</x-app-layout>
