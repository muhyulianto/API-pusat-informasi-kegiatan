@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title d-inline-block">
                            Data kategori
                        </div>
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm float-right">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategoris as $key => $kategori)
                                <tr>
                                    <td scope="row">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $kategori->nama }}
                                    </td>
                                    <td>
                                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary btn-sm">
                                            edit
                                        </a>
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post" class="d-inline-block">
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