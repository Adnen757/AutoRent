@extends('layouts.admin')

@section('title', 'Messages de Contact')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Boîte de réception</h3>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                        <td><span style="font-weight: 600;">{{ $contact->name }}</span></td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>
                            <div style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $contact->message }}
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('admin.contacts.delete', $contact) }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="padding: 1rem;">
            {{ $contacts->links() }}
        </div>
    </div>
@endsection