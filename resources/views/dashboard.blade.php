<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

    @foreach($perpustakaan as $book)
    <div class="d-flex align-items-center border-bottom py-3" data-toggle="modal" data-target="#updateDataModal{{ $book->id }}">
        <img class="rounded flex-shrink-0" src="{{ asset('images')}}/{{ $book->image }}" alt="" style="width: 40px; height: 40px;">
        <div class="w-100 ms-3">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-0">{{ $book->title }}</h6>
            </div>
            <span>{{ $book->story }}</span>
        </div>
    </div>


        @include('layouts.update.index')
        @include('layouts.delete.index')
        
    @endforeach
    @include('layouts.create.index')

</x-app-layout>
