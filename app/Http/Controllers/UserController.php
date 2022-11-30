<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view(
            'users.index',
            [
                'users' => $users,
            ]
        );
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', ['user' => User::findOrFail($user->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user = User::findOrFail($user->id);

        // if (Gate::denies('update-user', $user)) {
        //     abort(403);
        // }
        // $this->authorize('update', $user);

        // $validated = $request->validated();

        $user->card = Hash::make($request['card']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        // $user->card = $request['card'];



        $user->save();


        session()->flash("Status-success", "User updated");


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        //
        dd("User Delete not working, Needs to cascade, didnt have enough time to fix");
        if (Auth::check()) {

            if ($user->id == auth()->user()->id) {
                session()->flash('Status-danger', 'Your cannot delete yourself');
                return redirect()->route('users.index');
            }
        }
        $user = User::findOrFail($user->id);
        // if (Gate::denies('delete-user', $user)) {
        //     abort(403);
        // }
        // $this->authorize('delete', $user);

        $user->delete();

        session()->flash('Status-success', 'User was deleted!');

        return redirect()->route('users.index');
    }
}
