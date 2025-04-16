<x-back.layout >

    <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
        <div class="col">
            <div class="card p-3">
                <h5>عدد الزوار الكلي </h5>
                <p class="fs-4" id="total-visitors">{{ $visiters_count ?? 'No Visiters yet' }}</p>
            </div>
        </div>
        <div class="col">
            <div class="card p-3">
                <h5>عدد الزوار الحاليين </h5>
                <p class="fs-4" id="current-visitors">{{ $visiters_act_count ?? 'No Visiters In The Building' }}</p>
            </div>
        </div>
        <div class="col">
            <div class="card p-3">
                <h5>عدد الزوار المغادرين </h5>
                <p class="fs-4" id="left-visitors">{{ $visiters_inact ?? 'All Visiters In The Building' }}</p>
            </div>
        </div>
        <div class="col">
            <div class="card p-3">
                <h5>أحدث زائر دخل </h5>
                <p class="fs-6" id="last-entry">{{ $last_visiter ?? 0 }}</p>
            </div>
        </div>
    </div>

    <div class="card p-3">
        <h5 class="mb-3">سجل الزوار </h5>
        <div class="table-responsive">
            <table id="visitors-table" class="table table-striped table-bordered text-white" style="width:100%">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>الاسم</th>
                        <th>رقم الهوية</th>
                        <th>الهاتف</th>
                        <th>اسم الموظف</th>
                        <th>القسم</th>
                        <th>الحالة</th>
                        <th>وقت الدخول</th>
                        <th>وقت الخروج</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($visiters as $visiter)
                        <tr>
                            <td>{{ $visiter->id }}</td>
                            <td>{{ $visiter->name }}</td>
                            <td>{{ $visiter->idNumber }}</td>
                            <td>{{ $visiter->phone }}</td>
                            <td>{{ $visiter->empName }}</td>
                            <td>{{ $visiter->depName }}</td>
                            <td>{{ $visiter->is_here ? 'active' : 'inActive' }}</td>
                            <td>{{ $visiter->time_in ?? 'The Visiter Not in The Building' }}</td>
                            <td>{{ $visiter->time_out ?? 'The Visiter In The Building Now' }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  @push('js')
  <script>
    $(document).ready(function() {
        $('#visitors-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
            }
        });
    });
</script>
  @endpush
</x-back.layout>

