@extends('layouts.home')

@section('title', 'employee')

@section('header')
    <p>Create employee</p>
@endsection

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('employee.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Masukkan Name" required maxlength="64">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required maxlength="50">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" placeholder="Masukkan Age" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <select class="form-control" name="id_position" id="id_position" required>
                <option value="" selected disabled>Pilih Position</option>
                @foreach ($positions as $position)
                <option value="{{ $position->id }}">{{ $position->position }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" name="salary" placeholder="Masukkan Salary" required>
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Simpan</button>
        </div>
    </form>
@endsection
