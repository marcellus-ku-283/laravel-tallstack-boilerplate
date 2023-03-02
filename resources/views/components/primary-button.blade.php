<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-primary text-white hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:text-white dark:bg-slate-800 hover:dark:bg-slate-600 hover:dark:text-white']) }}>
    {{ $slot }}
</button>
