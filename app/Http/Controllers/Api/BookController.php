<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->orderBy('id', 'DESC')->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $books,
            'message' => 'Books retrieved successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:books|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:1000',
            'category_id' => 'required|exists:categories,id',
            'hashtags' => 'nullable|array',
            'hashtags.*' => 'integer|exists:hashtags,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Please check your input',
            ]);
        }

        $validated = $validator->validated();

        $validated['image'] = $request->file('image')?->store('books');

        $book = Book::create($validated);

        if (!empty($validated['hashtags']))
            $book->hashtags()->sync($validated['hashtags']);

        return response()->json([
            'success' => true,
            'data' => $book,
            'message' => 'Book created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json([
            'success' => true,
            'data' => $book,
            'message' => 'Book retrieved successfully',
        ]);
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
