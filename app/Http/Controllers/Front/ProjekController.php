<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Projek;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Projek::where("user_id", auth()->user()->id)->paginate(12);

        return view("pages.front.user.projek.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.front.user.projek.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|string",
            "deskripsi" => "required|string",
            "image" => "image",
            "dealine" => "string",
        ]);
        $data = $request->except("_token");

        $data["deadline"] = Carbon::parse($request->deadline);

        if ($request->image) {
            $data["image"] = $request->image->store("projek/img", "public");
        }
        if ($request->file) {
            $data["file"] = $request->file->store("projek/file", "public");
        }

        $data["user_id"] = auth()->user()->id;

        $insert = Projek::create($data);

        return redirect()->back()->with("success", "Berhasil menambahkan projek")->with("message", "Selanjutnya akan diproses");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projek = Projek::find(decodeHashIds($id));

        return view("pages.front.user.projek.detail", [
            'projek' => $projek
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
