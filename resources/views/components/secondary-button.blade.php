<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button secondary-button']) }}>
    {{ $slot }}
</button>
