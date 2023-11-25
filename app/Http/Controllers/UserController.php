<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
        return view('users.index', [
            'users' => SpladeTable::for(User::class)
                    ->column('name')
                    ->column('email')
                    ->column('created_at')
                    ->column('actions')
                    ->searchInput('name')
                    ->paginate(15)
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>Hash::make($request->password)
        ]);

        Toast::title('Your profile was updated!');

        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit' , [
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

         Toast::title('User Data Saved')->autoDismiss(3);

         return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
 
        Toast::title('User Data Delete')
            ->danger()
            ->autoDismiss(3);

        return to_route('users.index');
    }
}
