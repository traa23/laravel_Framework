<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
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
    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        //ini tidak boleh kosong atau null
        //$user->password = $request->password;

        //versi tidak eror
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // gunakan bcrypt untuk hashing
        }

        $user->save();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
