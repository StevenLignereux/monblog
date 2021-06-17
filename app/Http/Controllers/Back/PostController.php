<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\DataTables\PostsDataTable;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @param PostsDataTable $dataTable
     * @return Response
     */
    public function index(PostsDataTable $dataTable)
    {
        return $dataTable->render('back.shared.index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Integer|null $id
     * @return Application|Factory|View
     */
    public function create(int $id = null)
    {
        $post = null;

        if ($id) {
            $post = Post::findOrFail($id);

            if ($post->user_id === auth()->id()) {
                $post->title .= ' (2)';
                $post->slug .= '-2';
                $post->active = false;
            } else {
                $post = null;
            }
        }

        $categories = Category::all()->pluck('title', 'id');

        return view('back.posts.form', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @param PostRepository $repository
     * @return RedirectResponse
     */
    public function store(PostRequest $request, PostRepository $repository)
    {
        $repository->store($request);

        return back()->with('ok', __('The post has been successfully created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
