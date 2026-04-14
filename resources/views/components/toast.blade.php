<div x-data="{ 
        show: false, 
        message: '', 
        type: 'success' 
    }"
    x-init="
        @if(session('success'))
            message = '{{ session('success') }}';
            type = 'success';
            show = true;
            setTimeout(() => show = false, 3000);
        @elseif(session('error'))
            message = '{{ session('error') }}';
            type = 'error';
            show = true;
            setTimeout(() => show = false, 3000);
        @endif
    "
    @toast.window="
        message = $event.detail.message;
        type = $event.detail.type || 'success';
        show = true;
        setTimeout(() => show = false, 3000);
    "
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-y-full opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="translate-y-full opacity-0"
    class="fixed bottom-5 right-5 z-[100]"
    x-cloak>
    
    <div :class="{
        'bg-green-600': type === 'success',
        'bg-red-600': type === 'error',
        'bg-blue-600': type === 'info'
    }" class="text-white px-6 py-3 rounded-2xl shadow-2xl flex items-center gap-3">
        <template x-if="type === 'success'">
            <svg class="w-5 h-5 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </template>
        <template x-if="type === 'error'">
            <svg class="w-5 h-5 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
        </template>
        <span x-text="message" class="text-sm font-bold uppercase tracking-wider"></span>
    </div>
</div>
