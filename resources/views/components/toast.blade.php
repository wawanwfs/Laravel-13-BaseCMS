@php
    $toasts = collect();

    $flashToast = session('toast');
    if (is_array($flashToast) && isset($flashToast['message'])) {
        $toasts->push([
            'type' => $flashToast['type'] ?? 'info',
            'message' => $flashToast['message'],
        ]);
    } elseif (is_string($flashToast)) {
        $toasts->push([
            'type' => 'info',
            'message' => $flashToast,
        ]);
    }

    foreach (['success', 'error', 'warning', 'info', 'status'] as $type) {
        if (session()->has($type)) {
            $toasts->push([
                'type' => $type === 'status' ? 'success' : $type,
                'message' => session($type),
            ]);
        }
    }

    if ($toasts->isEmpty() && isset($errors) && $errors->any()) {
        $toasts->push([
            'type' => 'error',
            'message' => 'Please check the highlighted fields and try again.',
        ]);
    }

    $colors = [
        'success' => 'border-emerald-500/30 bg-emerald-50 text-emerald-900 ring-emerald-500/10 dark:bg-emerald-500/15 dark:text-emerald-100 dark:ring-emerald-400/20',
        'error' => 'border-rose-500/30 bg-rose-50 text-rose-900 ring-rose-500/10 dark:bg-rose-500/15 dark:text-rose-100 dark:ring-rose-400/20',
        'warning' => 'border-amber-500/30 bg-amber-50 text-amber-900 ring-amber-500/10 dark:bg-amber-500/15 dark:text-amber-100 dark:ring-amber-400/20',
        'info' => 'border-sky-500/30 bg-sky-50 text-sky-900 ring-sky-500/10 dark:bg-sky-500/15 dark:text-sky-100 dark:ring-sky-400/20',
    ];
    $icons = [
        'success' => 'check-circle',
        'error' => 'alert-circle',
        'warning' => 'alert-triangle',
        'info' => 'info',
    ];
@endphp
@if ($toasts->isNotEmpty())
    <div class="pointer-events-none fixed right-4 top-4 z-[1000] flex w-[calc(100%-2rem)] max-w-sm flex-col gap-3 sm:right-6 sm:top-6" aria-live="polite" aria-atomic="true">
        @foreach ($toasts as $toast)
            @php($type = in_array($toast['type'] ?? 'info', ['success', 'error', 'warning', 'info'], true) ? $toast['type'] : 'info')
            <div class="pointer-events-auto flex items-start gap-3 rounded-2xl border px-4 py-3 shadow-2xl ring-1 backdrop-blur {{ $colors[$type] }}"
                 role="{{ $type === 'error' || $type === 'warning' ? 'alert' : 'status' }}"
                 x-data="{ show: true }" x-show="show" x-transition.opacity.duration.200ms x-init="setTimeout(() => show = false, 5000)">
                <x-icon :name="$icons[$type]" class="mt-0.5 size-5 shrink-0" />
                <p class="min-w-0 flex-1 text-sm font-medium leading-6">{{ $toast['message'] }}</p>
                <button type="button" class="-mr-1 grid size-8 shrink-0 cursor-pointer place-items-center rounded-lg opacity-70 transition hover:bg-black/5 hover:opacity-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-current dark:hover:bg-white/10" @click="show = false" aria-label="Dismiss notification">
                    <x-icon name="x" class="size-4" />
                </button>
            </div>
        @endforeach
    </div>
@endif
