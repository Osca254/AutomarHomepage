@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Car Information
                </div>
                <div class="float-end">
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->description }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="design" class="col-md-4 col-form-label text-md-end text-start"><strong>design:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->design }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="performance" class="col-md-4 col-form-label text-md-end text-start"><strong>performance:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->performance }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="model" class="col-md-4 col-form-label text-md-end text-start"><strong>model:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->model }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="brand" class="col-md-4 col-form-label text-md-end text-start"><strong>brand:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->brand }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->price }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="images" class="col-md-4 col-form-label text-md-end text-start"><strong>Images:</strong></label>
                        <div class="col-md-6">
                            @if ($car->carImages->isNotEmpty())
                                @foreach ($car->carImages as $image)
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="car Image" style="max-width: 100%;">
                                @endforeach
                            @else
                                No Images
                            @endif
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection