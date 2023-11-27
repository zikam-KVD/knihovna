<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function vratAutory()
    {
        $autori = DB::table('autors')->get();

        return View('autori', ['autors' => $autori]);
    }

    public function deleteAutor(int $id)
    {
        DB::table('autors')->where('id', $id)->delete();
       // dd($autor);
       // $autor->delete();

        dd('Smazal jsem autora ' . $id);
    }
}
