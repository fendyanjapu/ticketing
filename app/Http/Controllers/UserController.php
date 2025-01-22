<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $rules = [
        'name' => 'required',
        'username' => 'required',
    ];
    public function index()
    {
        $users = User::all();
        return view('user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules);
        $validatedData['password'] = Hash::make($request->password);
        $validatedData['isAdmin'] = 0;
        User::create($validatedData);

        return redirect()->route('user.index')->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate($this->rules);
        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        }
        User::findOrFail($user->id)->update($validatedData);

        return redirect(route('user.index'))->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect(route('user.index'))->with('success','Data berhasil dihapus');
    }
}
