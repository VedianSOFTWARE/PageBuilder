<div {{ $attributes->merge(['class' => $class ?? '']) }}>
    @dump($attributes)
    {{ $slot }}
</div>
