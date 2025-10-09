<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed top-5 right-5 z-50">
    <div class="flex items-center text-white px-4 py-3 rounded-lg shadow-lg {{ $bgColor }}">
        <strong class="mr-2">{{ $title }}:</strong>
        <span>{{ $slot }}</span>
        <button class="ml-4 text-white font-bold" @click="show = false">
            &times;
        </button>
    </div>
</div>
