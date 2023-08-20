<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagsComponent extends Component
{
    public $tags;

    protected $listeners = ['tagAdded', 'tagRemoved'];

    public function mount()
    {
        $allTags = Tag::all();

        $this->tags = json_encode($allTags->pluck('name'));
    }

    public function tagAdded($tag)
    {
        Tag::create()
    }

    public function tagRemoved($tag)
    {

    }


    public function render()
    {
        return view('livewire.tags-component');
    }
}
