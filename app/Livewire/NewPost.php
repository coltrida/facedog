<?php

namespace App\Livewire;

use App\Services\PostService;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads;

    public $title;
    public $body;

    #[Validate('image|max:2048')] // 2MB Max
    public $photo;

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
            $this->dispatch('mostraMessaggio', 'Salvataggio completato!');

            if ($this->photo){
                $filename = $post->id . '.' . $this->photo->extension();
                $this->photo->storeAs('posts', $filename);
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
