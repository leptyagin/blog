<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_img'] = Storage::disk('public')->put('/image', $data['preview_img']);
        $data['main_img'] = Storage::disk('public')->put('/image', $data['main_img']);

        $post->update($data);
        $post->tags()->sync($tagIds);

        return view('admin.post.show', compact('post'));
    }
}
