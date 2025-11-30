@extends('layouts.admin')

@section('title', 'Modifier un Client')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <div class="table-container" style="padding: 2rem;">
            <form action="{{ route('admin.clients.update', $client) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="first_name" value="{{ $client->first_name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nom</label>
                    <input type="text" name="last_name" value="{{ $client->last_name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $client->email }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                    <input type="password" name="password" class="form-control" minlength="6">
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2rem;">
                    <a href="{{ route('admin.clients') }}" class="btn btn-danger" style="background: #6b7280;">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
@endsection