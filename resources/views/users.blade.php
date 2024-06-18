<x-app-layout>

<div class="container">
    <div class="header-bg mt-5 mb-8" id="connexion">
        {{ __("Gestion des utilisateurs :") }}
    </div>

   <!-- partie users -->
  <!-- resources/views/users.blade.php -->


    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin.users.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('admin.users.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <table class="table table-bordered">
                        <thead class="thead" style="background-color: #009AEA80;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sélectionner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-danger">Supprimer les utilisateurs sélectionnés</button>
                    </div>
                </form>
            </div>  
        </form>



        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.users.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <table class="table table-bordered">
                    <thead class="thead" style="background-color: #009AEA80;">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Nbr publications</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->evenements_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
</div>
</x-app-layout>
