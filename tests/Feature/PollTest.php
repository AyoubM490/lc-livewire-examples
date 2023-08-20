<?php

namespace Tests\Feature;

use App\Http\Livewire\PollExample;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PollTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function main_page_has_poll_component()
    {
        $this->get('/')
            ->assertSeeLivewire('poll-example');
    }

    /** @test * */
    public function poll_sums_orders_correctly()
    {
        $orderA = Order::create(['price' => 20]);
        $orderB = Order::create(['price' => 20]);

        Livewire::test(PollExample::class)
            ->call('getRevenue')
            ->assertSet('revenue', 40)
            ->assertSee('$40')
        ;

        $orderC = Order::create(['price' => 20]);

        Livewire::test(PollExample::class)
            ->call('getRevenue')
            ->assertSet('revenue', 60)
            ->assertSee('$60')
        ;
    }
}
