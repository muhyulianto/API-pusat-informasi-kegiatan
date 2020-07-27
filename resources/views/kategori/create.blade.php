@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Tambah kategori
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama kategori</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="nama">
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