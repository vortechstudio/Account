<div class="container">
    <div class="d-flex flex-center mx-auto w-75 rounded-3">
        <div class="table-responsive">
            <table class="table table-rounded table-row-bordered table-primary table-striped gap-2 gs-5 gy-5">
                <thead>
                <tr class="fw-bolder fs-3">
                    <x-base.table-header :direction="$orderDirection" name="created_at" :field="$orderField">Date</x-base.table-header>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->created_at->format("d/m/Y à H:i") }}</td>
                        <td>{{ $log->action }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $logs->links() }}
    </div>
</div>
