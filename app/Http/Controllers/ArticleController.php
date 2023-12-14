<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('article.list')->with([
            'articles' => Article::with('author')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.add')->with([
            'author' => Author::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, Article $article)
    {
        $path = ' ';
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('article');
        }
        $data = [
            "title" => $request->get("title"),
            "content" => $request->get("content"),
            "file" => $path,
            "publication_at" => $request->get("publication_at"),
            "author_id" => $request->get("author_id"),
        ];
        $article->create($data);
        return response()->redirectToRoute('article.create')->with([
            'create' => $article->create($data)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $author = Author::pluck('name', 'id');
        return view('article.edit', compact('author', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        if ($request->hasFile('file')) {
            Storage::delete($article->file);
            $path = $request->file('file')->store('article');
        } else {
            $path = $article->file;
        }

        $data = [
            "title" => $request->get("title", $article->title),
            "content" => $request->get("content", $article->content),
            "file" => $path,
            "publication_at" => $request->get("publication_at", $article->publication_at),
            "author_id" => $request->get("author_id", $article->author_id),
        ];
        return response()->redirectToRoute('article.index')->with([
            'update' => $article->update($data)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        return response()->redirectToRoute('article.index')->with([
            'delete' => $article->delete()
        ]);
    }
}
