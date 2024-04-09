<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button danger-button' ]) }}>
    {{ $slot }}
</button>
