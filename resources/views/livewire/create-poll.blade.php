<div>
    <div class="mb-4">
        <h1 class="text-xl font-bold tracking-wide mb-4">Poll Title</h1>

        <input type="text" wire:model.live="title" placeholder="Enter poll question">
    </div>
    {{-- <p>Current Title : {{ $title }}</p> --}}

    <div class="my-4">
        <button class="btn" wire:click.prevent="handleClick">Add Option</button>
    </div>

    <div>
        <h2 class="text-xl font-bold tracking-wide mb-4">Option</h2>
        @foreach ( $options as $index => $option )
            <div>
                {{ $index + 1 }} - {{ $option }}
            </div>
        @endforeach
    </div>
</div>

