<?php

namespace App\Livewire;

use App\Models\Post;
use App\Services\PostService;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination; // Enables the paginate() method.

    public $posts;
    public $perPage = 10; // Questo rimane il "limite" per ogni singola richiesta
    public $page = 1;     // <-- NUOVO: Un contatore per la pagina corrente
    public $hasMorePages;

    public function mount()
    {
        $this->loadPosts();
    }

    public function loadPosts()
    {
        // Ottieni la "pagina" successiva di post
        $newPosts = Post::latest()
            ->paginate($this->perPage, ['*'], 'page', $this->page); // <-- MODIFICATO QUI

        // Concatena i nuovi post a quelli esistenti
        $this->posts = $this->posts ? $this->posts->concat($newPosts->items()) : collect($newPosts->items());

        // Aggiorna lo stato per sapere se ci sono altre pagine
        $this->hasMorePages = $newPosts->hasMorePages();

        // Incrementa il contatore della pagina per la prossima richiesta
        $this->page++; // <-- NUOVO: Incrementa il contatore della pagina
    }

    public function render()
    {
        return view('livewire.home');
    }
}
