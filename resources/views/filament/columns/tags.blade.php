@props(['record'])

@php
    $tags = $record->tags ?? collect();

    // Валидатор hex-цвета (возвращает нормализованный #rrggbb или null)
    $normalizeHex = function (?string $hex) {
        if (! $hex) return null;
        $hex = trim($hex);
        // allow #fff or #ffffff (case-insensitive)
        if (preg_match('/^#?[0-9a-fA-F]{3}$/', $hex)) {
            $hex = ltrim($hex, '#');
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
            return '#'.strtolower($hex);
        }
        if (preg_match('/^#?[0-9a-fA-F]{6}$/', $hex)) {
            $hex = ltrim($hex, '#');
            return '#'.strtolower($hex);
        }
        return null;
    };

    // Возвращает '#000' или '#fff' в зависимости от яркости фона
    $contrastTextColor = function (?string $hex) {
        if (! $hex) return '#000';
        $hex = ltrim($hex, '#');
        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        // perceived luminance
        $lum = (0.299*$r + 0.587*$g + 0.114*$b) / 255;
        return $lum > 0.6 ? '#000' : '#fff';
    };
@endphp

<div style="display:flex;flex-wrap:wrap;gap:0.35rem;">
    @foreach($tags as $tag)
        @php
            $raw = $tag->color ?? null;
            $bgHex = $normalizeHex($raw) ?? '#e5e7eb'; // fallback gray if invalid/missing
            $fgHex = $contrastTextColor($bgHex);
            // безопасный вывод имени
            $label = e($tag->Name);
        @endphp

        <span
            role="status"
            aria-label="{{ $label }}"
            style="
                display:inline-block;
                padding:0.18rem 0.45rem;
                border-radius:0.375rem;
                font-size:0.78rem;
                line-height:1;
                background: {{ $bgHex }};
                color: {{ $fgHex }};
                margin-right:0.25rem;
                white-space:nowrap;
            "
        >
            {!! $label !!}
        </span>
    @endforeach
</div>
