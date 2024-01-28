@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Car
                </div>
                <div class="float-end">
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="design" class="col-md-4 col-form-label text-md-end text-start">design</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('design') is-invalid @enderror" id="design" name="design">{{ old('design') }}</textarea>
                            @if ($errors->has('design'))
                                <span class="text-danger">{{ $errors->first('design') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                            <span id="price-error" class="text-danger"></span>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="performance" class="col-md-4 col-form-label text-md-end text-start">Performance Details</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('performance') is-invalid @enderror" id="performance" name="performance">{{ old('performance') }}</textarea>
                            @if ($errors->has('performance'))
                                <span class="text-danger">{{ $errors->first('performance') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="model" class="col-md-4 col-form-label text-md-end text-start">model Details</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('model') is-invalid @enderror" id="model" name="model">{{ old('model') }}</textarea>
                            @if ($errors->has('model'))
                                <span class="text-danger">{{ $errors->first('model') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="brand" class="col-md-4 col-form-label text-md-end text-start">brand Details</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand">{{ old('brand') }}</textarea>
                            @if ($errors->has('brand'))
                                <span class="text-danger">{{ $errors->first('brand') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="images" class="col-md-4 col-form-label text-md-end text-start">Images</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control @error('images.*') is-invalid @enderror" id="images" name="images[]" multiple>
                            @if ($errors->has('images'))
                                <span class="text-danger">{{ $errors->first('images') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add car">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="module" src="{{ asset('js/app.js') }}"></script>
@endsection
