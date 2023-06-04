<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Hashtag;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.books.index', [
            'books' => Book::with('category')->orderBy('id', 'DESC')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create')->with([
            'categories' => Category::pluck('name', 'id'),
            'hashtags' => Hashtag::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:books|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:1000',
            'category_id' => 'required|exists:categories,id',
            'hashtags' => 'nullable|array',
            'hashtags.*' => 'integer|exists:hashtags,id',
        ]);

        $validated['image'] = $request->file('image')?->store('books');

        $book = Book::create($validated);

        $book->hashtags()->sync($validated['hashtags']);

        return redirect(route('admin.books.index'))->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with(['hashtags', 'category'])->findOrFail($id);
        return view('admin.books.show', compact('book'));
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
