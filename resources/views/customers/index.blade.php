@extends('customers.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Customers List</div>
            <div class="card-body">
                <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Tipo Id</th>
                        <th scope="col">Identificacion</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->tipo_id }}</td>
                            <td>{{ $customer->identification }}</td>
                            <td>{{ $customer->cellphone }}</td>
                            <td>{{ $customer->telephone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Product Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $customers->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection