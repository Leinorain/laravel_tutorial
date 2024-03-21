<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::select('id', 'name', 'email')->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }
}
