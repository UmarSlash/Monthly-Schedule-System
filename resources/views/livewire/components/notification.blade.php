<!-- resources/views/livewire/notifications.blade.php -->

<div>
    @foreach($notifications as $index => $notification)
        <div class="notification" wire:key="{{ $index }}">
            {{ $notification }}
            <button wire:click="removeNotification({{ $index }})">Close</button>
        </div>
    @endforeach
</div>
