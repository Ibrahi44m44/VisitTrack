<x-layout>

    <div class="d-flex justify-content-between align-items-center">
        <h1>All Visiter</h1>
        <a href="{{ route('visiter.create') }}" class="btn btn-outline-info btn-sm">Add Visiter</a>
    </div>
    <table class="table table-bordered border-danger ">
        <tr>
            <th class="bg-secondary-subtle">Id</th>
            <th class="bg-secondary-subtle">Id Number</th>
            <th class="bg-secondary-subtle">Name</th>
            <th class="bg-secondary-subtle">Phone</th>
            <th class="bg-secondary-subtle">Employ Name</th>
            <th class="bg-secondary-subtle">Department Name</th>
            <th class="bg-secondary-subtle">Is Here</th>
            <th class="bg-secondary-subtle">Time In</th>
            <th class="bg-secondary-subtle">Time Out</th>
            <th class="bg-secondary-subtle">Action</th>
        </tr>
        @forelse ($visters as $v)
            <tr class="text-center">

                <td>{{ $v->id }}</td>
                <td>{{ $v->idNumber }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->phone }}</td>
                <td>{{ $v->empName }}</td>
                <td>{{ $v->depName }}</td>
                <td>{{ $v->is_here ? 'he/she Active' : 'he/she Not Active' }}</td>
                @if($v->time_in)
                    <td>{{ $v->time_in->format('F d , Y') }}</td>
                @else
                    <td>The Visiter Not in The Building</td>
                @endif

                @if ($v->time_out)
                    <td>{{ $v->time_out->difFforHumans() }}</td>
                @else
                    <td>The Visiter In The Building Now</td>
                @endif
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="m-2">
                            @if ($v->is_here)
                                <form action="{{ route('visiter.isNotHer', $v) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-danger">he/she Gone</button>
                                </form>
                            @else
                                <form action="{{ route('visiter.isHer', $v) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-success">he/she here</button>
                                </form>
                            @endif
                        </div>


                    </div>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center text-bg-danger">No Data Found</td>
            </tr>
        @endforelse
    </table>
    {{ $visters->links() }}

</x-layout>
