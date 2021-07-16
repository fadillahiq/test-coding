@extends('layouts.home')

@section('title', 'Position')

@section('header')
    <p>Data Position</p>
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
    <form action="{{ route('position.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" name="position" placeholder="Masukkan Position" required>
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Simpan</button>
        </div>
    </form>
@endsection
