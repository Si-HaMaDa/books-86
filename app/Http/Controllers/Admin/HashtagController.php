<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hashtags = Hashtag::orderBy('id', 'DESC')->paginate(10);
        return view('admin.hashtags.index', compact('hashtags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hashtags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:hashtags|max:100',
        ]);

        $hashtag = new Hashtag();
        $hashtag->name = $validated['name'];
        $hashtag->save();

        return redirect(route('admin.hashtags.index'))->with('success', 'Hashtags created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hashtag = Hashtag::find($id);

        if (!$hashtag) {
            return redirect(route('admin.hashtags.index'))->with('error', 'Hashtag not found!');
        }

        return view('admin.hashtags.show', compact('hashtag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hashtag = Hashtag::find($id);

        if (!$hashtag) {
            return redirect(route('admin.hashtags.index'))->with('error', 'Hashtag not found!');
        }

        return view('admin.hashtags.edit', compact('hashtag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:hashtags,name,' . $id . '|max:100',
        ]);

        $hashtag = Hashtag::find($id);

        if (!$hashtag) {
            return redirect(route('admin.hashtags.index'))->with('error', 'Hashtag not found!');
        }

        $hashtag->name = $validated['name'];
        $hashtag->save();

        return redirect(route('admin.hashtags.index'))->with('success', 'Hashtag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hashtag = Hashtag::find($id);

        if (!$hashtag) {
            return redirect(route('admin.categories.index'))->with('error', 'ashtag not found!');
        }

        $hashtag->delete();

        return redirect(route('admin.categories.index'))->with('success', 'ashtag deleted successfully');
    }
}
