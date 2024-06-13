<?php

use App\Models\Secret;
use Livewire\Volt\Component;

new class extends Component
{
    public Secret $secret;

    public function mount(Secret $secret)
    {
        $this->secret = $secret;
    }

    public function burn()
    {
        $this->secret->delete();

        $this->redirect(route('secrets.index'));
    }
};

?>

<div>
    {{ $this->secret->name }}
    <button wire:click="burn">Burn</button>
</div>
