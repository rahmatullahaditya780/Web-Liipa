@props(['flip' => false])

<div {{ $attributes->merge(['class' => 'wave-divider'.($flip ? ' wave-divider--flip' : '')]) }} aria-hidden="true">
    <svg viewBox="0 0 1440 56" preserveAspectRatio="none" focusable="false">
        <path fill="currentColor"
            d="M0,28 C180,56 360,0 540,8 C720,16 900,56 1080,48 C1260,40 1380,12 1440,24 L1440,56 L0,56 Z" />
    </svg>
</div>
