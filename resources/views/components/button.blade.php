<button {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-primary text-white hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>