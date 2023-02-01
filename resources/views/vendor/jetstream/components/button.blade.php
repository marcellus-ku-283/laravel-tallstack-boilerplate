<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-primary-800 border border-transparent rounded-md font-semibold text-xs text-primary-300  uppercase tracking-widest hover:bg-primary-700 active:bg-primary-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
