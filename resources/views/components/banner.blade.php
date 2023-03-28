<div x-data="{
    messages: [],
    remove(message) {
        this.messages.splice(this.messages.indexOf(message), 1)
    },
}"
    @notify.window="let message = $event.detail; messages.push(message); setTimeout(() => { remove(message) }, 800)"
    class="fixed inset-0 z-50 flex flex-col items-end justify-center px-4 py-6 space-y-4 pointer-events-none sm:p-6 sm:justify-start">
    <template x-for="(message, messageIndex) in messages" :key="messageIndex" hidden>
        <div x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="w-full max-w-sm bg-white rounded-lg shadow-lg pointer-events-auto">
            <div class="w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg pointer-events-auto ">
                <div class="p-4 bg-green-200"
                    :class="{
                        'bg-blue-300': message.type == 'info',
                        'bg-yellow-300': message.type == 'warning',
                        'bg-red-300': message.type == 'error'
                    }">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div x-show="message.type === 'success'">
                                <x-svg.correct class="text-green-700" />
                            </div>

                            <div x-show="message.type === 'error'">
                                <x-svg.error class="text-red-700" />
                            </div>

                            <div x-show="message.type === 'info'">
                                <x-svg.info class="text-blue-700" />
                            </div>

                            <div x-show="message.type === 'warning'">
                                <x-svg.warn class="text-yellow-700" />
                            </div>
                        </div>

                        <div class="flex-1 w-0 ml-3">
                            <p x-text="message.title" class="font-extrabold text-md"
                                :class="{
                                    'text-green-800': message.type == 'success',
                                    'text-blue-800': message.type == 'info',
                                    'text-yellow-800': message.type == 'warning',
                                    'text-red-800': message.type == 'error'
                                }">
                            </p>
                            <p x-text="message.message" class="mt-1 text-sm font-semibold"
                                :class="{
                                    'text-green-600': message.type == 'success',
                                    'text-blue-600': message.type == 'info',
                                    'text-yellow-600': message.type == 'warning',
                                    'text-red-600': message.type == 'error'
                                }">
                            </p>
                        </div>
                        <div class="flex flex-shrink-0 ml-4">
                            <button @click="remove(message)"
                                class="inline-flex text-green-700 transition duration-150 ease-in-out focus:outline-none focus:text-green-500"
                                :class="{
                                    'text-blue-700': message.type == 'info',
                                    'text-yellow-700': message.type == 'warning',
                                    'text-red-700': message.type == 'error'
                                }">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
