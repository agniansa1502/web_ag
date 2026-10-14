@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-light rounded p-4">

        <h3 class="mb-4">Hasil Pencarian</h3>

        @if($q)
            <p>
                Kamu mencari:
                <strong>{{ $q }}</strong>
            </p>
        @else
            <p>Belum ada kata yang dicari.</p>
        @endif

    </div>

</div>

@endsection