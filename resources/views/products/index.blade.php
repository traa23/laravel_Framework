@extends('layout.admin.app')
@section('title', 'Produk')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Produk</h1>
                <p class="mb-0">List seluruh produk</p>
            </div>
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-success text-white">
                    + Tambah Produk
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-products" class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0">Id</th>
                                    <th class="border-0">Nama</th>
                                    <th class="border-0">Harga</th>
                                    <th class="border-0">Deskripsi</th>
                                    <th class="border-0">Dibuat</th>
                                    <th class="border-0 rounded-end text-center" style="width:160px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $i => $item)
                                    <tr>
                                        <td>{{ $products->firstItem() + $i }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($item->description, 80) }}</td>
                                        <td>{{ optional($item->created_at)->format('d M Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('products.edit', $item->id) }}"
                                                class="btn btn-outline-primary btn-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('products.destroy', $item->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-info mb-0">Belum ada data produk.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($products, 'hasPages') && $products->hasPages())
                        <div class="pt-3">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection