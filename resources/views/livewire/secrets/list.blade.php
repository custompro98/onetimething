<?php

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component
{
    public Collection $secrets;

    public function mount()
    {
        $this->getSecrets();
    }

    #[On('secret.created')]
    public function getSecrets()
    {
        $this->secrets = auth()->user()->secrets()->get();
    }
};
?>

<div>
    <table class="w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th>Expires</th>
            </tr>
        </thead>
        @foreach ($secrets as $secret)
            <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-200">
                <td class="p-2">
                    <a class="text-blue-500 underline" href="{{ route('secrets.show', $secret->slug) }}"
                        wire:navigate>{{ $secret->name }}</a>
                </td>
                <td class="p-2 text-center">{{ $secret->expiredAtHumanized() }}</td>
            </tr>
        @endforeach
    </table>
</div>
