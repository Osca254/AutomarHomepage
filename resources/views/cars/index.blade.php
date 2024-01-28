@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Car List</div>
    <div class="card-body">
            <a href="{{ route('cars.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Car</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Brand</th>
                <th scope="col">Design</th>
                <th scope="col">Model</th>
                <th scope="col">Performance</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->description }}</td>
                    <td>{{ $car->price }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->design }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->performance }}</td>
                    <td>
                        @if ($car->carImages->isNotEmpty())
                            @foreach ($car->carImages as $image)
                                <img src="{{ asset('storage/' . $image->image) }}" alt="car Image" style="max-width: 100px; max-height: 100px;">
                            @endforeach
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this car?');"><i class="bi bi-trash"></i> Delete</button>

                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No car Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $cars->links() }}

    </div>
</div>
@endsection