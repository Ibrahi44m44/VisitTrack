<x-layout title="Create New Vister">

    <div class="card bg-secondary">
        <div class="card-body">
            <form action="{{ route('visiter.update' , $visiter) }}" method="POST">
                @csrf
                @method('PUT')
                @include('front._form')
                <div class="mt-3">
                    <button class="btn btn-success btn-sm"><i class="fas fa-save"></i> save</button>
                </div>
            </form>
        </div>
    </div>


</x-layout>
