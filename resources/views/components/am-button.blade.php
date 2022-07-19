<div>
    <button type="button"
        {{ $attributes->merge(['type' => $type ?? 'button', 'class' => 'inline-block px-6 py-2.5 '.$bgColor.' text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:'.$bgSecondaryColor.' hover:shadow-lg focus:'.$bgSecondaryColor.' focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out']) }}>
        {{ $slot }}
    </button>
</div>
