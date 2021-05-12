<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index')->withUsers(User::with('profile')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

            $data = $request->validate([
                'name' => 'required',
                'email' => 'email|unique:users',
                'password' => 'required|confirmed',
                'avatar' => 'image'
            ]);
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);
            if($avatar = $request->file('avatar')){
                $path = $avatar->store('user-image');
                $user->profile()->create([
                    'avatar' => $path
                ]);
            }
            return redirect()->route('users.index')->withSuccess('Create user successfully');
        }catch (\Throwable $ex){
            return redirect()->route('users.index')->withError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required',
            'avatar' => 'image',
            'facebook' => 'url',
            'youtube' => 'url'
        ]);
        $updateDataUser = [
            'name' => $request->name,
        ];
        if($request->password){
            $updateDataUser['password'] = bcrypt($request->password);
        }
        $user->update($updateDataUser);

        $updateDataProfile = [
            'about' => $request->about,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube
        ];
        if($request->avatar){
            if($user->profile && $user->profile->avatar){
                Storage::delete($user->profile->avatar);
            }
            $updateDataProfile['avatar'] = $request->avatar->store('user-image');
        }
        Profile::updateOrCreate(['user_id' => $user->id], $updateDataProfile);
        return redirect()->back()->withSuccess('Update successfully');
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function makeAdmin(Request $request, User $user)
    {
        //
        $user->role = 'admin';
        $user->save();
        return redirect()->back()->withSuccess('Update successfully');
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function removeAdmin(Request $request, User $user)
    {
        //
        $user->role = 'writer';
        $user->save();
        return redirect()->back()->withSuccess('Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
