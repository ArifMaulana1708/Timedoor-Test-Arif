<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);
        $search = $request->input('search');

        $books = Book::with(['author', 'category'])
            ->withAvg('ratings as ratings_avg_score', 'rating_score')
            ->orderByDesc('ratings_avg_score')
            ->withCount('ratings')
            ->when($search, function ($q) use ($search) {
                $q->where('book_title', 'like', "%$search%")
                    ->orWhereHas('author', fn ($a) => $a->where('author_name', 'like', "%$search%"))
                    ->orWhereHas('category', fn ($c) => $c->where('category_name', 'like', "%$search%"));
            })
            ->orderByDesc('ratings_avg_score')
            ->paginate($limit);

        return view('book.index', compact('books'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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