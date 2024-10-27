<?php

namespace App\Http\Controllers\Admin\Akses;

use App\Http\Controllers\Controller;
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
        $items = User::orderBy("id", "desc")->where("roles", "user")->paginate(12);

        return view("pages.admin.akses.user.index", [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.akses.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|unique:users,email"
        ]);

        $data = $request->except("_token", "_method");
        $data["password"] = Hash::make($request->password);
        User::create($data);

        return redirect()->back()->with("success", "Berhasil Simpan Data User");
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
        $user = User::findOrFail($id);

        return view("pages.admin.akses.user.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->except("_token", "_method", "password");

        if ($request->password) {
            $data["password"] = Hash::make($request->password);
        }

        if ($request->email !== $user->email) {
            $request->validate([
                'email' => "unique:users,email"
            ]);
        }

        $user->update($data);

        return redirect()->back()->with("success", "Berhasil Edit Data User");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with("success", "Berhasil hapus data");
    }
}
