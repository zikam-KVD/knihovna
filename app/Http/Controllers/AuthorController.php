<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function vratAutory()
    {
        $autori = Author::all();

        return View('autori', ['autors' => $autori]);
    }

    public function deleteAutor(int $id)
    {
        //Author::where('id', $id)->delete();

        $autor = Author::find($id);
        $autor->delete();

        return back();
    }

    public function pridatAutora(Request $request)
    {
        //$name = $request->input('name');
        //$last_name = $request->input('last_name');

        $validated = $request->validate([
            'name' => 'required|string|min:5|max:10',
            'last_name' => 'required|string|min:5',
        ]);

        $autor = new Author([
            'last_name' => $validated['name'],
            'name' => $validated['last_name'],
        ]);
        //$autor->name = $name;
        //$autor->last_name = $last_name;
        $autor->year = date('Y-m-d', time());
        $autor->save();

        return back()->with('msg', "Autor byl vložen.");
    }
}
