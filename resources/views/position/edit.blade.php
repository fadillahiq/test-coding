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
    <form action="{{ route('position.update', $position->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" name="position" placeholder="Masukkan Position" value="{{ $position->position }}" required>
        </div>

        <div class="form-group">
            <button class="btn btn-warning" type="submit">Perbarui</button>
        </div>
    </form>
@endsection
