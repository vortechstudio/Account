<div class="container w-75">
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="card-title">Etat des Services & Options</h3>
        </div>
        <div class="card-body">
            <div class="card shadow-sm bg-light-primary mb-5">
                <div class="card-header">
                    <h3 class="card-title">Services Actifs</h3>
                </div>
                <div class="card-body">
                    @if(count($actifs) != 0)
                        <div class="table-responsive">
                            <table class="table table-striped gap-5 gs-5 gy-5 gx-5">
                                <thead class="table-dark">
                                <tr>
                                    <th>Service</th>
                                    <th>Date d'enregistrement</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($actifs as $actif)
                                    <tr>
                                        <td>{{ $actif->service->name }}</td>
                                        <td>{{ $actif->created_at->isoFormat("LL") }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <x-base.is-null text="Aucun service actuellement actif" />
                    @endif
                </div>
            </div>
            <div class="card shadow-sm bg-light-danger mb-5">
                <div class="card-header">
                    <h3 class="card-title">Services Inactif</h3>
                </div>
                <div class="card-body">
                    @if(count($inactifs) != 0)
                        <div class="table-responsive">
                            <table class="table table-striped gap-5 gs-5 gy-5 gx-5">
                                <thead class="table-dark">
                                <tr>
                                    <th>Service</th>
                                    <th>Date de résiliation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inactifs as $inactif)
                                    <tr>
                                        <td>{{ $inactif->service->name }}</td>
                                        <td>{{ $inactif->deleted_at->isoFormat("LL") }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <x-base.is-null text="Aucun services actuellement inactif"/>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
