@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div id="mainCarousel" class="carousel" style="position: relative; overflow: hidden;">
            <div class="carousel-inner" style="display: flex;">
                @foreach ($cars as $index => $car)
                    <div class="carousel-item{{ $index === 0 ? ' active' : '' }}" style="flex: 0 0 100%; margin-left: {{ $index === 0 ? '0' : '-100%' }};">
                        {{-- Hero Section --}}
                        <div id="heroSection" class="mb-5" style="height: 62vh; background-color: #f8f9fa; position: relative; overflow: hidden; border: 1px solid #dee2e6; border-radius: 8px;">
                            {{-- Left Side --}}
                            {{-- Left Side --}}
<div style="position: absolute; top: 50%; left: 0; transform: translateY(-50%); padding: 0 20px; max-width: 20%;">
    <h5>Name</h5>
    <p>{{ $car->name }}</p>
    <h5>Model</h5>
    <p>{{ $car->model }}</p>
    <h5>Description</h5>
    <p style="word-wrap: break-word;">{{ $car->description }}</p>
</div>

                            {{-- Hero Image --}}
                            <div style="margin: 10vh auto; height: 74%; width: 50%; overflow: hidden; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <!-- Replace this line with your actual image tag -->
    <img src="{{ asset('storage/' . $car->carImages->first()->image) }}" alt="Hero Car Image" class="img-fluid hero-image" style="height: 100%; width: 100%; object-fit: cover; border-radius: 8px;">
</div>

                            {{-- Right Side --}}
                            <div style="position: absolute; top: 40%; right: 0; transform: translateY(-50%); padding: 0 20px;">
                                <h5>Performance</h5><span>
                                <p>{{ $car->performance }}</p></span>
                                <h5>Design</h5>
                                <p>{{ $car->design }}</p>
                                <h5>Brand</h5>
                                <p>{{ $car->brand }}</p>
                            </div>
                        </div>

                        {{-- Details Section --}}
                        <div class="mb-5" style="background-color: #fff; position: relative; border: 1px solid #dee2e6; border-radius: 8px; overflow: hidden;">
                            <div style="display: flex; justify-content: space-between; flex-wrap: wrap; padding: 20px;">
                                @foreach ($car->carImages->slice(1) as $image)
                                    <div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 20px; margin-right: 20px;">
                                        <div style="height: calc(100% - 20px); overflow: hidden; border: 1px solid #dee2e6; border-radius: 8px;">
                                            {{-- Car Image  --}}
                                            <img src="{{ asset('storage/' . $image->image) }}" alt="Car Image" class="img-fluid car-image" style="height: 100%; width: 100%; object-fit: cover; border-radius: 8px;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Next Button --}}
                            <button class="carousel-control-next btn btn-dark" type="button" data-bs-target="#mainCarousel" data-bs-slide="next" style="position: absolute; bottom: 3px; right: 3px; border-radius: 2%;">
                                <span class="carousel-control-next-icon" color="dark"></span>
                                <span class="">Next</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .carousel-inner {
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            flex: 0 0 100%;
        }

        .hero-image,
        .car-image {
            border-radius: 8px;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var carImages = document.querySelectorAll('.car-image');
            carImages.forEach(function(image) {
                image.addEventListener('click', function() {
                    var imageUrl = this.getAttribute('src');
                    document.querySelector('.hero-image').setAttribute('src', imageUrl);
                });
            });

            document.getElementById('mainCarousel').addEventListener('slid.bs.carousel', function () {
                var currentCarIndex = document.querySelector('.carousel-item.active').getAttribute('data-bs-slide-to');
                var currentHeroImageUrl = document.querySelector('.carousel-item[data-bs-slide-to="' + currentCarIndex + '"]').querySelector('.car-image').getAttribute('src');
                document.querySelector('.hero-image').setAttribute('src', currentHeroImageUrl);
            });
        });
    </script>
@endsection
