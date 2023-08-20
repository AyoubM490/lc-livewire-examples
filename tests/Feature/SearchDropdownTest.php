<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{

    /** @test * */
    public function main_page_contains_search_dropdown_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('search-dropdown');
    }

    /** @test * */
    public function search_dropdown_searches_correctly()
    {
        Livewire::test(SearchDropdown::class)
            ->assertDontSee('John Lennon')
            ->set('search', 'Imagine')
            ->assertSee('John Lennon')
        ;
    }

    /** @test * */
    public function search_dropdown_shows_message_if_no_song_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->set('search', 'asrgregdtfg')
            ->assertSee('No results found for')
        ;
    }
}
