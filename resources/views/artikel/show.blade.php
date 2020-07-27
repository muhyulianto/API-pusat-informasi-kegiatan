@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Info detail artikel
                    </div>
                    <div class="card-body d-flex">
                        <div class="w-50 p-2">
                            <img src="{{ asset('storage/'.$artikel->gambar) }}" class="img-fluid" alt="">
                        </div>
                        <table class="table">
                            <tr>
                                <th>
                                    Judul artikel
                                </th>
                                <td>
                                    {{ $artikel->judul }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Isi artikel
                                </th>
                                <td>
                                    {{ $artikel->isi }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection