{{-- Worker Card --}}
@if ($requiredrole == 'worker')
    <a class="bg-blue-400 overflow-hidden rounded-2xl hover:bg-blue-300  border-2 border-blue-900" href="{{ $route }}">

        <div class="items-center bg-blue-200 py-1 px-1">
            <h2 class="font-semibold text-center">{{ $title }}</h2>
        </div>

        <p class="ml-4 py-2 leading-relaxed text-left">
            {{ $description }}
        </p>
    </a>
@endif

{{-- Worker Card --}}
@if ($requiredrole == 'manager')
    <a class="bg-orange-400 overflow-hidden rounded-2xl hover:bg-orange-300  border-2 border-orange-900" href="{{ $route }}">

        <div class="items-center bg-orange-200 py-1 px-1">
            <h2 class="font-semibold text-center">{{ $title }}</h2>
        </div>

        <p class="ml-4 py-2 leading-relaxed text-left">
            {{ $description }}
        </p>
    </a>
@endif

{{-- Worker Card --}}
@if ($requiredrole == 'admin')
    <a class="bg-red-400 overflow-hidden rounded-2xl hover:bg-blue-red  border-2 border-red-900" href="{{ $route }}">

        <div class="items-center bg-red-200 py-1 px-1">
            <h2 class="font-semibold text-center">{{ $title }}</h2>
        </div>

        <p class="ml-4 py-2 leading-relaxed text-left">
            {{ $description }}
        </p>
    </a>
@endif
