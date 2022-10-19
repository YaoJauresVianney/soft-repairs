<div class="card p-5">

    <div>
        <label for="query" class="sr-only">Recherche</label>
        <input type="text" wire:model="query" id="query" class="form-control">
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Référence</th>
            <th>Clients</th>
            <th>Catégories</th>
            <th>Nombre de jours</th>
            <th>Enlèvement</th>
            <th>Statut</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach ($repairs as $repair)
            <tr>
                <td><a href="{{ route('repairs.invoice', $repair->id) }}">{{ $repair->reference }}</a></td>
                <td>{{ $repair->client->fullname }}</td>
                <td>
                    <span class="alert-success p-1">
                        {{$repair->peopletype->label}}
                    </span>
                    <br>
                    {{ $repair->vehiclecategory->fullname }}
                    <br>
                    {{ $repair->car_brand }} - {{ $repair->car_imm }}
                </td>
                <td>{{ $repair->numberDays() }}</td>
                <td>{!! gmdate('d-m-Y', strtotime($repair->date_getting)) !!} <br>
                    à {!! $repair->hour_getting !!} <br>
                    {!! $repair->place_getting !!}
                </td>
                <td>
                    @if($repair->state == 'pending')
                        <div class="alert alert-success">En cours</div>
                    @else
                        <div class="alert alert-primary">Terminé</div>
                    @endif
                </td>
                <td>
                    @if($repair->reduction != 0)
                        <span style="text-decoration:line-through;">
                            {!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA
                        </span>
                        <br>
                        <span style="color: #DB580D;font-weight: bold;">
                            {!! number_format(($repair->sumDays()+$repair->tva()) - $repair->reduction,0,'','.') !!} FCFA
                        </span>
                    @else
                        <span>
                            {!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA
                        </span>
                    @endif

                </td>
                <td class="d-flex">
                    <a href="{{ route('repairs.payment', $repair->id) }}">
                        <img src="{{ asset('svg/paiement.svg') }}" alt="Payer" height="20" width="20">
                    </a>
                    <a href="{{ route('repairs.edit', $repair->id) }}">
                        <img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20">
                    </a>
                    <a href="">
                        <img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20">
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $repairs->links() }}
    {{-- The Master doesn't talk, he acts. --}}
</div>
