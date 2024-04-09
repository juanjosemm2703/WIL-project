<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button primary-button']) }}>
    {{ $slot }}
</button>
