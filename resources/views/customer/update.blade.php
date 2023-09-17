@extends('dashboard.layouts.home')

@section('body')
    <h2>Edit Customer</h2>
    <form method="Post" action="{{ route('dashboard.customers.update',  ['id' => $customer->id]) }}">
        @csrf
        @method('Put')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
