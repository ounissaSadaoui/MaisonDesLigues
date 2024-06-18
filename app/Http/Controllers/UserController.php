<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Evenement;

class UserController extends Controller
{
    public function index(): View
    {

        //là on récup les publications 
        $users = User::withCount('evenements')->get();
        
        return view('users', compact('users'));
        /*
        $users = User::withCount('evenement')->get();
        $users = User::all();
        return view('users', compact('users'));
        */
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour ! ');
    }

    public function destroy(Request $request)
    {
        $userIds = $request->input('user_ids');
        if ($userIds) {
            User::whereIn('id', $userIds)->delete();
        }

        return redirect()->route('admin.users.index')->with('success', 'L\'utilisateur est supprimé');
    }
}
