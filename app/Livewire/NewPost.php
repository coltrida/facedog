<?php

namespace App\Livewire;

use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads;

    public $title;
    public $body;

    #[Validate(['photo.*' => 'image|max:2048'])]
    public $photo = [];

    public function salvaPost(PostService $postService)
    {
        $request = new Request();
        $request->merge([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => auth()->user()->id
        ]);

        $post = $postService->savePost($request);
        if ($post){

            if (count($this->photo) > 0){
                foreach ($this->photo as $pic){
                    $idCartellaPost = $post->id;
                    $nrPhotoInCartellaPost = Storage::disk('public')->exists('/posts/'.$idCartellaPost) ?
                        count(Storage::disk('public')->files('/posts/'.$idCartellaPost)) + 1 : 1;
                    $filename = $nrPhotoInCartellaPost . '.' . $pic->extension();
                    $pic->storeAs('posts/'.$idCartellaPost, $filename);
                }


                /*$filename = $post->id . '.' . $this->photo->extension();
                $this->photo->storeAs('posts', $filename);*/
            }

            $this->reset(['title', 'body', 'photo']);
            session()->flash('status', 'Post Created.');
            $this->redirectRoute('myProfile');
        }

    }

    public function render()
    {
        return view('livewire.new-post');
    }
}
