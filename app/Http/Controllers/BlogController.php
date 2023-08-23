<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Utilities\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($request->ajax()){
            if($user->role == 'admin'){
                $model = Blog::query();
            }else{
                $model = Blog::query()->where('user_id', $user->id);
            }
            return DataTables::of($model)->toJson();
        }
        return view('blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('blogs.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        Blog::create($request->all());
        return redirect()->route('blogs.index')->with('success', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        if (auth()->user()->role == 'user' && auth()->user()->id != $blog->user_id){
            return redirect()->route('blogs.index')->withErrors('Not hase access this page');
        }
        return view('blogs.show', compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (auth()->user()->role == 'user' && auth()->user()->id != $blog->user_id){
            return redirect()->route('blogs.index')->withErrors('Not hase access this page');
        }
        $users = User::all();
        return view('blogs.edit', compact('blog', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());
        return redirect()->route('blogs.index')->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
    }

}
