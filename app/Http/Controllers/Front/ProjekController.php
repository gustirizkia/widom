<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\JasaKategori;
use App\Models\Projek;
use App\Models\ProjekHasKategoriJasa;
use App\Models\TransaksiHasKategoriJasa;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $kategoriJasa = JasaKategori::orderBy("nama", "asc")->get();

        return view("pages.front.user.projek.create", [
            'kategoriJasa' => $kategoriJasa
        ]);
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
            "jasa" => "required",
        ]);

        DB::beginTransaction();

        try {

            $data = $request->except("_token", "jasa");

            $data["deadline"] = Carbon::parse($request->deadline);

            if ($request->image) {
                $data["image"] = $request->image->store("projek/img", "public");
            }
            if ($request->file) {
                $data["file"] = $request->file->store("projek/file", "public");
            }

            $data["user_id"] = auth()->user()->id;

            $insert = Projek::create($data);

            foreach ($request->jasa as $item) {
                $projekHasKategoriJasa = ProjekHasKategoriJasa::create([
                    "projek_id" => $insert->id,
                    "kategori_jasa_id" => $item
                ]);
            }



            DB::commit();

            return redirect()->back()->with("success", "Berhasil menambahkan projek")->with("message", "Selanjutnya akan diproses");
        } catch (Exception $th) {
            DB::rollBack();

            return redirect()->back()->with("error", "Terjadi Kesalahan Server");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projek = Projek::with("projekHasKategoriJasa.kategoriJasa")->find(decodeHashIds($id));

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
