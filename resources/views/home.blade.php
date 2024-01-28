@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($cars as $index => $car)
                    <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                        {{-- Hero Section --}}
                        <div id="heroSection" class="mb-5 d-flex align-items-center position-relative" style="height: 62vh; background-color: lightgreen; overflow: hidden;">
                            {{-- Left Side --}}
                            <div class="position-absolute top-50 start-0 translate-middle-y px-4 text-uppercase left-side">
                                <h5>Name</h5>
                                <p>{{ $car->name }}</p>
                                <h5>Model</h5>
                                <p>{{ $car->model }}</p>
                                <h5>Description</h5>
                                <p>{{ $car->description }}</p>
                            </div>
                            {{-- Hero Image --}}
                            <div class="mb-4 mx-auto" style="height: 100%; width: 150%; overflow: hidden;">
                                <img src="{{ asset('storage/' . $car->carImages->first()->image) }}" alt="Hero Car Image" class="img-thumbnail hero-image" style="height: 100%; width: 100%; object-fit: cover;">
                            </div>
                            {{-- Right Side --}}
                            <div class="carousel-caption d-md-block position-absolute top-50 end-0 translate-middle-y px-4 text-uppercase right-side">
                                <h5>Performance</h5>
                                <p>{{ $car->performance }}</p>
                                <h5>Design</h5>
                                <p>{{ $car->design }}</p>
                                <h5>Brand</h5>
                                <p>{{ $car->brand }}</p>
                            </div>
                        </div>
                        
                        {{-- Details Section --}}
                        <div id="detailsSection" class="mb-5" style="background-color: lightyellow; position: relative;">
                            <div class="row justify-content-between" style="height: 100%;">
                                @foreach ($car->carImages->slice(1) as $image)
                                    <div class="col-md-4">
                                        <div class="mb-4" style="height: calc(100% / {{ ceil(count($car->carImages) / 3) }});">
                                            {{-- Car Image  --}}
                                            <img src="{{ asset('storage/' . $image->image) }}" alt="Car Image" class="img-thumbnail car-image" style="height: 100%; width: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Next Button --}}
                            <button class="carousel-control-next btn btn-dark-blue" type="button" data-bs-target="#mainCarousel" data-bs-slide="next" style="position: absolute; bottom: 20px; right: 20px;">
                                <span class="carousel-control-next-icon" color="dark-blue" ></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.car-image').click(function() {
                var imageUrl = $(this).attr('src');
                $('.hero-image').attr('src', imageUrl);
            });

            $('#mainCarousel').on('slid.bs.carousel', function () {
                var currentCarIndex = $('.carousel-item.active').index();
                var currentHeroImageUrl = $('.carousel-item').eq(currentCarIndex).find('.car-image:first').attr('src');
                $('.hero-image').attr('src', currentHeroImageUrl);
            });
        });
    </script>
@endsection
