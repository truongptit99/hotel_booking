@if (!empty($image))
    <img src="{{ asset('storage/rooms/' . $image) }}" alt="thumbnail" style="width: 100px; height: auto;" onerror="this.src='{{ asset('assets/images/no_image.png') }}'">
@endif
