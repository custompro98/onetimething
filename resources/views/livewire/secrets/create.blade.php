<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';

    public string $value = '';

    public function create()
    {
        $this->validate();

        auth()
            ->user()
            ->secrets()
            ->create([
                'name' => $this->name,
                'slug' => hash('md5', auth()->user()->email.Str::slug($this->name)),
                'value' => Crypt::encryptString($this->value),
                'expired_at' => Carbon::now('UTC')->addDays(1),
            ]);

        $this->name = '';
        $this->value = '';

        $this->dispatch('secret.created');
    }

    public function rules()
    {
        return [
            'name' => [Rule::prohibitedIf(preg_match('/^[a-zA-Z0-9_]+$/', $this->name) === 0), 'required', 'string', 'min:1', 'max:255'],
            'value' => 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a name for the secret.',
            'name.string' => 'Name must be a string.',
            'name.prohibited' => 'The name must only contain letters, numbers, and underscores.',
            'name.min' => 'Name is too short.',
            'name.max' => 'Name is too long.',
            'value.required' => 'Please enter a value for the secret.',
            'value.string' => 'Value must be a string.',
            'value.min' => 'Value is too short.',
        ];
    }
};

?>

<form wire:submit="create">
    <div class="flex flex-col gap-3">
        <div class="flex flex-col gap-1">
            <label for="name" class="text-sm">Name</label>
            <input type="text" wire:model="name" placeholder="ServiceX API Key" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="flex flex-col gap-1">
            <label for="value" class="text-sm">Value</label>
            <input type="password" wire:model="value" placeholder="api-1234567890" />
            <x-input-error :messages="$errors->get('value')" class="mt-2" />
        </div>
        <button type="submit" class="border border-black max-w-fit p-2">Create</button>
    </div>
</form>
