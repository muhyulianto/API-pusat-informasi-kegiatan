@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Tambah artikel
                    </div>
                    <div class="card-body">
                        <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul artikel</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="" aria-describedby="judul">
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi artikel</label>
                                <textarea class="form-control" name="isi" id="isi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori artikel</label>
                                @forelse ($kategoris as $kategori)
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="kategori[]" id="" value="{{ $kategori->id }}">
                                        {{ $kategori->nama }}
                                    </label>
                                </div>
                                @empty
                                <div class="form-group">
                                  <small id="notfound" class="text-danger">Silahkan buat kategori dahulu </small>
                                </div>
                                @endforelse
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar artikel</label>
                                <input type="file" name="gambar" id="gambar" class="form-control-file" placeholder="" aria-describedby="gambar">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Tambahkan
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection