@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ url('/') }}" class="float-right">< Voltar</a>
            <br />

            <h2>{{ ($action == 'new') ? 'Novo' : 'Editar' }} Cliente</h2>

            <br />

            <form id="{{ $action }}ClientForm">
                @if (isset($client))
                    <input type="hidden" id="clientId" value="{{ $client->id }}">
                @endif
                <div class="form-group">
                    <label for="clientName">Nome</label>
                    <input type="text" class="form-control" id="clientName" name="name" placeholder="Nome" value="{{ $client->name ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="clientEmail">E-mail</label>
                    <input type="email" class="form-control" id="clientEmail" name="email" placeholder="E-mail" value="{{ $client->email ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="clientPhone">Telefone</label>
                    <input type="text" class="form-control" id="clientPhone" name="phone" placeholder="(xx) xxxxx-xxxx" value="{{ $client->phone ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="clientState">Estado</label>
                    <select id="clientState" class="form-control" required>
                        <option value="">Escolha o estado</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}" {{ (isset($client) && $client->city->state_id == $state->id) ? 'selected' : '' }}>{{ $state->uf }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="clientCity">Cidade</label>
                    <select id="clientCity" name="city" class="form-control" {{ (!isset($client)) ?  'disabled' : '' }} required>
                        <option>Escolha a cidade</option>
                        @if (isset($client))
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ ($client->city->id == $city->id) ? 'selected' : '' }}>{{ $city->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="clientBirthdate">Data de Nascimento</label>
                    <input type="date" class="form-control" id="clientBirthdate" name="birthdate" placeholder="dd/mm/yyyy" value="{{ $client->birthdate ?? '' }}" required>
                </div>

                <h4>Planos</h4>

                @foreach ($plans as $plan)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="plans[]" type="checkbox" value="{{ $plan->id }}" id="plan{{ $plan->id }}" {{ (isset($client) && in_array($plan->id, $client->plans()->pluck('id')->all())) ? 'checked' : '' }}>
                        <label class="form-check-label" for="plan{{ $plan->id }}">
                            {{ $plan->name }}
                        </label>                    
                    </div>
                @endforeach

                <br /><br />

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/client.js') }}"></script>
@endsection