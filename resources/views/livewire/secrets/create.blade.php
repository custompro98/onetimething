<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component
{
    #[Validate('required|string|min:1|max:255')]
    public string $name = '';

    #[Validate('required|string|min:1')]
    public string $value = '';

    public function create()
    {
        $this->validate();

        auth()
            ->user()
            ->secrets()
            ->create([
                'name' => $this->name,
                'value' => Crypt::encryptString($this->value),
                'expired_at' => Carbon::now('UTC')->addDays(1),
            ]);

        $this->name = '';
        $this->value = '';

        $this->dispatch('secret.created');
    }
};

?>

<form wire:submit="create">
    <div class="flex flex-col gap-2">
        <div class="flex flex-col">
            <input type="text" wire:model="name" placeholder="ServiceX API Key" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="flex flex-col">
            <input type="password" wire:model="value" placeholder="api-1234567890" />
            <x-input-error :messages="$errors->get('value')" class="mt-2" />
        </div>
        <button type="submit" class="border border-black max-w-fit p-2">Create</button>
    </div>
</form>
