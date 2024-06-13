<?php

use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component
{
    public Collection $secrets;

    public function mount()
    {
        $this->getSecrets();
    }

    private function getSecrets()
    {
        $this->secrets = auth()->user()->secrets()->get();
    }
};
?>

<div>
    <ul>
        @foreach ($secrets as $secret)
            <li class="list-disc"><a class="text-blue-500 underline"
                    href="{{ route('secrets.show', $secret->id) }}">{{ $secret->name }}</a></li>
        @endforeach
    </ul>
</div>
