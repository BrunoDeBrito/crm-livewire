<?php

namespace App\Livewire\Customers\Opportunities;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{
    public function render(): View
    {
        return view('livewire.customers.opportunities.index');
    }
}
