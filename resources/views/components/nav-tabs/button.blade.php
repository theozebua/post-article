<button class="nav-link border-0 {{ $active }}" id="nav-{{ $status }}-tab" data-bs-toggle="tab"
    data-bs-target="#nav-{{ $status }}" type="button" role="tab" aria-controls="nav-{{ $status }}"
    aria-selected="true">
    {{ $slot }}
</button>
