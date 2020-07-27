@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title d-inline-block">
                            Data artikel
                        </div>
                        <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm float-right">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul artikel</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($artikels as $key => $artikel)
                                <tr>
                                    <td scope="row">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $artikel->judul }}
                                    </td>
                                    <td>
                                        @forelse ($artikel->kategoris as $kategori)
                                            {{ $kategori->nama . "," }}
                                        @empty
                                            Kosong
                                        @endforelse
                                    </td>
                                    <td>
                                        <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-success btn-sm">
                                            detail
                                        </a>
                                        <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-primary btn-sm">
                                            edit
                                        </a>
                                        <form action="{{ route('artikel.destroy', $artikel->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Data tidak ditemukan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection