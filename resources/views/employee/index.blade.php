@extends('layouts.home')

@section('title', 'Employee')

@section('header')
   <div class="row">
        <p>Data Employee</p>
        <a class="btn btn-primary btn-sm ml-auto" href="{{ route('employee.create') }}">Tambah Employee</a>
   </div>
@endsection

@section('content')
   @if ($message = Session::get('success'))
       <div class="alert alert-success">
           {{ $message }}
       </div>
   @endif
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->age }}</td>
                    <td>{{ $employee->position->position }}</td>
                    <td>{{ number_format($employee->salary) }}</td>
                    <td>
                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('apakah anda yakin ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12"><p class="text-danger text-center">Data Kosong !</p></td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $employees->links() }}
    </div>
@endsection
