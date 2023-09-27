@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <div {{ $attributes->merge(['class' => 'error']) }}>{{$message}}</div>
    @endforeach
@endif
