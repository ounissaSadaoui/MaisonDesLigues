<x-app-layout>

<div class="container">
    <div class="header-bg mt-5" id="connexion">
        {{ __("Liste des utilisateurs :") }}
    </div>

   <!-- partie users -->
   <div id="users" class="mt-6 bg-white shadow-sm rounded-lg">
    <div class="grid-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Ville</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->ville }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
</x-app-layout>
