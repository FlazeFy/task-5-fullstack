@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}

                <div class="row mt-4">
                    <div class="col-lg-8">
                        <button class="btn btn-success mb-2 float-end" data-bs-toggle='modal' data-bs-target='#tambah-artikel-Modal'><i class="fa-solid fa-plus"></i> Tambah Artikel</button>
                        @include('layouts.articles_table')
                        @include('layouts.form.add_articles')
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-success mb-2 float-end" data-bs-toggle='modal' data-bs-target='#tambah-kategori-Modal'><i class="fa-solid fa-plus"></i> Tambah Kategori</button>
                        @include('layouts.categories_table')
                        @include('layouts.form.add_categories')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
