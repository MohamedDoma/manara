@extends('website.layout')
@section('content')
    <main class="main-content">
        <div class="container bg-white p-0 " >
            <div class="col-md-12 p-4 text-center" data-aos="fade-down" data-aos-delay="100">
                <h2>خريطة الاثار </h2>
                @if($selected_city)
                    اثار مدينة   {{$selected_city->category_name}}
                @endif
            </div>
            <div class="col-md-12 p-4 " data-aos="fade-down" data-aos-delay="100">
                <div class="bg-light p-4 d-flex justify-content-center align-items-center w-100">
                    <form class="d-flex  justify-content-between align-items-center w-100">
                        <select class="form-control m-2 text-dark " onchange="location = this.value;">
                            <option @if(!$selected_city) selected  @endif value="{{route('website.map')}}">All Locations </option>

                            @foreach($cities as $city)
                                <option @if($selected_city &&  $selected_city->id == $city->id) selected  @endif value="{{route('website.map').'?city='.$city->id }}">{{ $city->category_name }}</option>
                            @endforeach

                        </select>
                        <select class="form-control m-2 text-dark" >
                            <option>Land mark type</option>
                        </select>
                        <a href="{{route('website.map')}}" class="text-danger m-2">
                            <strong>
                                Clear
                            </strong>
                        </a>
                    </form>
                </div>
                <div style="height: 500px;" id="mapid"></div>
            </div>
        </div>
    </main>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>

    @endpush
@push('scripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script>
        var mymap = L.map('mapid').setView([32.824,13.206], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: ''
        }).addTo(mymap);
        @foreach($posts as $post)
            @if($post->cords)
                L.marker([{{$post->cords}}]).addTo(mymap).bindPopup('<a href="{{route('post.show', $post)}}"> {{$post->post_title}}</a>.');
            @endif
        @endforeach
        var popup = L.popup();
        function onMapClick(e){
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
        }
        mymap.on('click', onMapClick);
    </script>

@endpush
