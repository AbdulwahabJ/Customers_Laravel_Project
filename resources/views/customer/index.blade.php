@extends('dashboard.layouts.home')
@section('body')
    <h3> Customers Table </h3>
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Manage</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        {{-- {{dd($customer->id)}} --}}

                        <a href="{{ route('dashboard.customers.edit', $customer->id) }}" class="action-links">Edit</a>
                        {{-- <a href="{{ route('dashboard.customers.delete', $customer->id) }}" class="action-links">Delete</a> --}}
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('dashboard.customers.delete', $customer->id)}}">Delete<i class="fa fa-trash"></i></a>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
