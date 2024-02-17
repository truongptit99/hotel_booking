@if ($listRoom->isNotEmpty())
    <div class="row">
        @foreach ($listRoom as $room)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="hotel-box">
                    <!--header -->
                    <div class="header clearfix">
                        <img src="{{ asset('storage/rooms/' . $room->image) }}" alt="room-col-4" class="img-responsive">
                    </div>
                    <!-- Detail -->
                    <div class="detail clearfix">
                        <h3>
                            <a href="{{ route('get.room.detail', $room->slug) }}" class="text-line-clamp-1">{{ $room->name }}</a>
                        </h3>
                        <h5 class="room-type">{{ array_search($room->type, config('constants.room_type')) }}</h5>
                        <h5 class="number-people">Maximum number of people: {{ $room->max_adult . ' adult(s)' }} {{ !empty($room->max_children) ? ', ' . $room->max_children . ' children' : ''}}</h5>
                        <h5 class="price">
                            {{ number_format($room->price) . ' VND/night' }}
                        </h5>
                        <p class="room-description text-line-clamp-3">{{ $room->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {{ $listRoom->links() }}
    </div>
@else
    <div class="text-center" style="font-size: 16px; font-weight: 600;">No room available!</div>
@endif
