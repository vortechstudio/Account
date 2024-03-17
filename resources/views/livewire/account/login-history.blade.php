<div class="container">
    <div class="d-flex flex-wrap justify-content-center gap-5">
        <div class="rounded-3 bg-white shadow-lg p-5 w-450px border border-2 border-gray-300">
            <div class="d-flex flex-column">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center fs-3 fw-bold">
                        <i class="fa-solid fa-laptop fs-2 me-3"></i>
                        <span>{{ $actual_login->device_type }}</span>
                    </div>
                    <span class="badge badge-sm badge-light-primary">Appareil Actuel</span>
                </div>
                <div class="separator border-3 my-5"></div>
                <div class="d-flex flex-row align-items-center">
                    <i class="fa-solid fa-clock fs-4 me-3"></i>
                    <span class="fs-5">{{ $actual_login->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        </div>
        @foreach($devices as $device)
            @if($device->device_uuid != $actual_login->device_uuid)
            <div class="rounded-3 bg-white shadow-lg p-5 w-450px border border-2 border-gray-300">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center fs-3 fw-bold">
                            <i class="fa-solid fa-laptop fs-2 me-3"></i>
                            <span>{{ $device->device_type }}</span>
                        </div>
                        <button wire:click="logoutOutDevice({{ $device->id }})" class="btn btn-outline btn-sm btn-outline-dark">
                            Se déconnecter
                        </button>
                    </div>
                    <div class="separator border-3 my-5"></div>
                    <div class="d-flex flex-row align-items-center">
                        <i class="fa-solid fa-clock fs-4 me-3"></i>
                        <span class="fs-5">{{ $device->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="separator border-5 my-10"></div>
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Historique</h3>
        </div>
        <div class="card-body">
            <div class="d-flex flex-center mx-auto w-75 rounded-3">
                <div class="table-responsive">
                    <table class="table table-rounded table-row-bordered table-primary table-striped gap-2 gs-5 gy-5">
                        <thead>
                        <tr class="fw-bolder fs-3">
                            <x-base.table-header :direction="$orderDirection" name="login_at" :field="$orderField">Date</x-base.table-header>
                            <th>Appareil</th>
                            <x-base.table-header :direction="$orderDirection" name="ip_address" :field="$orderField">Adresse IP</x-base.table-header>
                            <th>Pays</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{ $log->login_at ? $log->login_at->isoFormat("LLLL") : $log->logout_at->isoFormat("LLLL") }}</td>
                                <td>
                                    {{ \IvanoMatteo\LaravelDeviceTracking\Models\Device::query()->where('ip', $log->ip_address)->first()->device_type }}
                                </td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->location ? $log->location['country'] : '' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $logs->links() }}
            </div>
        </div>
        <div class="card-footer">
            {{ $logs->links() }}
        </div>
    </div>
</div>
