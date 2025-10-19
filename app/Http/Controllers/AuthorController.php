<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('books')->latest()->get();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'nationality' => 'required|string|max:100',
        ]);

        Author::create($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Autor creado exitosamente');
    }

    public function show(Author $author)
    {
        $author->load('books');
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'nationality' => 'required|string|max:100',
        ]);

        $author->update($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Autor actualizado exitosamente');
    }

    public function destroy(Author $author)
    {
        $booksCount = $author->books()->count();
        
        if ($booksCount > 0) {
            return redirect()->route('authors.index')
                ->with('error', "No se puede eliminar el autor porque tiene {$booksCount} libro(s) asociado(s)");
        }

        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Autor eliminado exitosamente');
    }
}