<div x-data="{ 
    open: false, 
    title: '', 
    message: '', 
    action: null,
    confirmText: 'Lanjutkan',
    cancelText: 'Batal',
    type: 'danger'
}"
    @confirm.window="
    title = $event.detail.title || 'Konfirmasi Tindakan';
    message = $event.detail.message || 'Apakah Anda yakin ingin melakukan tindakan ini?';
    confirmText = $event.detail.confirmText || 'Lanjutkan';
    cancelText = $event.detail.cancelText || 'Batal';
    type = $event.detail.type || 'danger';
    action = $event.detail.action;
    open = true;
"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-[110] overflow-y-auto"
    aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
        <!-- Backdrop -->
        <div x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false"
            class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity"></div>

        <!-- Modal panel -->
        <div x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 w-full sm:max-w-sm">

            <div class="bg-white p-6 pt-8 text-center">
                <!-- Icon -->
                <div :class="{
                    'bg-red-100 text-red-600': type === 'danger',
                    'bg-blue-100 text-blue-600': type === 'info',
                    'bg-warning/10 text-warning': type === 'warning'
                }" class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl mb-4">
                    <template x-if="type === 'danger'">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </template>
                    <template x-if="type === 'info'">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </template>
                </div>

                <div class="mt-3 text-center sm:mt-0">
                    <h3 x-text="title" class="text-lg font-bold uppercase tracking-wider text-gray-900" id="modal-title"></h3>
                    <div class="mt-2">
                        <p x-text="message" class="text-sm font-medium text-gray-500 leading-relaxed"></p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-2 p-6 pt-0">
                <button type="button"
                    @click="
                        if (typeof action === 'string') {
                            let form = document.querySelector(action);
                            if (form) form.submit();
                        } else if (typeof action === 'function') {
                            action();
                        }
                        open = false;
                    "
                    :class="{
                        'bg-red-600 hover:bg-red-700': type === 'danger',
                        'bg-blue-600 hover:bg-blue-700': type === 'info',
                        'bg-warning hover:bg-warning/90': type === 'warning'
                    }"
                    class="w-full inline-flex justify-center rounded-2xl px-3 py-3 text-sm font-bold text-white shadow-lg transition-all"
                    x-text="confirmText"></button>
                <button type="button"
                    @click="open = false"
                    class="w-full inline-flex justify-center rounded-2xl bg-gray-50 px-3 py-3 text-sm font-bold text-gray-500 hover:bg-gray-100 border border-gray-100 transition-all"
                    x-text="cancelText"></button>
            </div>
        </div>
    </div>
</div>