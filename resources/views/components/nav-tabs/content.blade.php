<div {{ $attributes->merge(['class' => 'tab-pane fade']) }} id="nav-{{ $navStatus }}" role="tabpanel"
    aria-labelledby="nav-{{ $navStatus }}-tab">
    {{ $slot }}
</div>
