@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Info detail kategori
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="nama">Nama kategori</label>
                                <input type="text" name="nama" id="nama" value="{{ $kategori->nama }}" class="form-control" placeholder="" aria-describedby="nama">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Tambahkan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection