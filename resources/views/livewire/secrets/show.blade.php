<?php

use App\Models\Secret;
use Illuminate\Support\Facades\Crypt;
use Livewire\Volt\Component;

new class extends Component
{
    public Secret $secret;

    public string $value = '';

    public function mount(Secret $secret)
    {
        $this->secret = $secret;
    }

    public function reveal()
    {
        $this->value = Crypt::decryptString($this->secret->value);
        $this->secret->delete();
    }
};

?>

<div class="flex flex-col gap-2">
    <div class="flex flex-row justify-between items-center">
        <h1 class="text-2xl font-semibold">{{ $this->secret->name }}</h1>
        <button wire:click="reveal" {{ $this->value === '' ? '' : 'disabled' }}
            class="{{ $this->value === '' ? '' : 'opacity-50' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </button>
    </div>
    <div class="flex flex-row items-center justify-center">
        @if (strlen($this->value > 0))
            <p class="max-w-sm overflow-ellipsis overflow-hidden">{{ $this->value }}</p>
        @else
            <div class="flex flex-row items-center justify-center gap-1">
                <span class="text-yellow-500">⚠️</span>
                <span class="text-sm">This secret is considered burned once revealed.</span>
                <span class="text-yellow-500">⚠️</span>
            </div>
        @endif
    </div>
</div>
