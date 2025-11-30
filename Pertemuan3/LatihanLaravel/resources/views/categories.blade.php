<x-layout>
    <x-slot:title>Categories</x-slot:title>

    {{-- Tambahkan class text-3xl dan font-bold agar judul besar --}}
    <h1>Daftar Categories</h1>

    <div>
        @foreach ($categories as $category)
            <article>
                {{-- Beri warna dan hover effect pada link --}}
                <h3>
                    <a href="/categories/{{ $category->slug }}">
                   {{ $category->name }}
                </a>
                </h3>
            </article>
        @endforeach 
    </div>
</x-layout>