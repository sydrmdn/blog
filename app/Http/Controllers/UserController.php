<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
        // dd($request->all());
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // Additional info
        $user->name = 'user' . mt_rand(10000, 99999);
        $user->avatar = 'https://picturepan2.github.io/spectre/img/avatar-3.png';
        $user->slug = str_slug($user->name);
        $user->bio = '';
        $user->twitter_url = '';
        $user->facebook_url = '';
        // *****
        $user->save();
        Session::flash('success', 'User created!');
        return redirect()->back();
    }

    public function show(User $user, $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        return view('admin.users.show', compact('user'));
    }

    public function update(Request $request, User $user, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required|string|email|max:255',
            'slug' => 'required',
            'bio' => 'required',
            'twitter_url' => 'required',
            'facebook_url' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->avatar = $request->avatar;
        $user->email = $request->email;
        $user->slug = $request->slug;
        $user->bio = $request->bio;
        $user->twitter_url = $request->twitter_url;
        $user->facebook_url = $request->facebook_url;
        $user->save();
        Session::flash('success', 'Profile updated!');
        return redirect()->back();
    }

    public function destroy(User $user, $id)
    {
    }
}
