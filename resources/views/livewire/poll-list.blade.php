<div class="container mx-auto mt-5 mb-5 max-w-lg">
    @if (count($polls) > 0)
        <ul>
            @foreach ($polls as $poll)
                <div class="mb-4 border rounded-md shadow-lg p-4">
                    <h2 class="text-2xl font-bold">{{ $poll->title }}</h2>
                    <div class="mt-2">
                        @foreach ($poll->options as $option)
                            <div class="flex items-center gap-2 mb-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <button class="btn">Vote</button>
                                    <p>{{ $option->name }}</p>
                                </div>
                                <span class="text-sm text-gray-500">({{ $option->votes()->count() }} votes)</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </ul>

    @else
        <p class="text-gray-500">No polls available.</p>
    @endif
</div>
