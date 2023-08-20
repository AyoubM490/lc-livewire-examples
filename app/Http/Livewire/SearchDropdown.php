<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search;
    public $searchResults = '';

    public function updatedSearch($newValue)
    {
        $response = Http::get('https://itunes.apple.com/search/?term=' . $this->search . '&limit=10');

//        dump($response->json()['results']);
        if (strlen($this->search) < 3) {
            $this->searchResults = [];
            return;
        }

        $this->searchResults = $response->json()['results'];

    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
