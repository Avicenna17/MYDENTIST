<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('pages.akun',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'role' => 'required|string|max:255',
        ]);
        User::create($request->all());



        return redirect()->route('user.index')->with('success', 'User created successfully');
    }
    public function show($id)
    {
        
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'role' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);

        // Jika ada password baru yang diberikan, validasi dan update password
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:6', // Sesuaikan dengan kebutuhan Anda
            ]);

            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        // Update data lainnya
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'role' => $request->role,
        ]);
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }
    }

}
