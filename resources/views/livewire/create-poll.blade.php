<div>
    <form wire:submit.prevent="createPoll">

        <div class="mb-4 shadow-sm   border rounded-md p-4">
            <h1 class="text-xl font-bold tracking-wide mb-4">Poll Title</h1>

            <input type="text" wire:model.live="title" placeholder="Enter poll question">

            @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror

            <button class="btn mt-4" wire:click.prevent="handleClick">Add Option</button>
        </div>

        <div class="border rounded-md shadow-lg p-4">
            <h2 class="text-xl font-bold tracking-wide mb-2">Poll Option</h2>
            @if (count($options) > 0)
                @foreach ($options as $index => $option)
                    <div class="mb-4">
                        <label>Option {{ $index + 1 }}</label>

                        <div class="flex items-center gap-2 mb-4">
                            <input type="text" wire:model.live="options.{{ $index }}" placeholder="Enter option text">
                            <button wire:click.prevent="removeOpt({{ $index }})" class="btn">Remove</button>
                        </div>

                        @error('options.' . $index)
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
            @else
                <p class="text-center font-light text-gray-500 py-4">You haven't added any options yet.</p>
            @endif
        </div>

        @if (count($options) > 0)
            <div class="mt-4 flex justify-end gap-2">
                <button type="submit" class="btn">Create Poll</button>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="mt-4 text-green-500" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                {{ session('message') }}
            </div>
        @endif
    </form>
</div>