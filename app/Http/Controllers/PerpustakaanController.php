<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perpustakaan; 

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpustakaan = Perpustakaan::all();
        return view('dashboard', compact('perpustakaan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'story' => 'required|string',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Perpustakaan::create([
            'title' => $request->title,
            'image' => $imageName,
            'story' => $request->story,
        ]);

        return redirect()->route('dashboard')->with('success', 'Book Berhasil Di Tambahkan');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'story' => 'required|string',
        ]);

        $perpustakaan = Perpustakaan::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $perpustakaan->update(['image' => $imageName]);
        }

        $perpustakaan->update([
            'title' => $request->title,
            'story' => $request->story,
        ]);

        return redirect()->route('dashboard')->with('success', 'Book Berhasil Di Update');
    }

    public function destroy(string $id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        $perpustakaan->delete();

        return redirect()->route('dashboard')->with('success', 'Book Berhasil Dihapus');
    }
}
