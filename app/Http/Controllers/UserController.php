<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }
}