<x-layout title="Create New Vister">
    @if (session('error_employ_not_found'))
        <div class="alert alert-danger">
            {{ session()->pull('error_employ_not_found') }}

        </div>
    @endif

    @if (session('error_no_match'))
        <div class="alert alert-danger">
            {{ session()->pull('error_no_match') }}
        </div>
    @endif
    <div class="card bg-secondary">
        <div class="card-body">
            <form action="{{ route('visiter.store') }}" method="POST">
                @csrf
                @include('front._form')
                <div class="mt-3">
                    <button class="btn btn-success btn-sm"><i class="fas fa-save"></i> save</button>
                </div>
            </form>
        </div>
    </div>


</x-layout>
