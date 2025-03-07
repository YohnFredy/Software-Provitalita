@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <flux:heading class="text-primary!" size="xl">{{ $title }}</flux:heading>
    <flux:subheading class=" text-secondary!">{{ $description }}</flux:subheading>
</div>
