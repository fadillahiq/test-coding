@extends('layouts.home')

@section('title', 'Position')

@section('header')
   <div class="row">
        <p>Data Position</p>
        <a class="btn btn-primary btn-sm ml-auto" href="{{ route('position.create') }}">Tambah Position</a>
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
                    <th>Position</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($positions as $position)
                <tr>
                    <td>{{ $position->position }}</td>
                    <td>
                        <form action="{{ route('position.destroy', $position->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('position.edit', $position->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('apakah anda yakin ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td><p class="text-danger text-center">Data Kosong !</p></td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $positions->links() }}
    </div>
@endsection
