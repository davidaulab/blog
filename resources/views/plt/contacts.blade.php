@extends ('layouts.app')



@section ('title', 'Listado de contacts')

@section ('content')


<table class="table table-striped table-primary">
@foreach ($contacts as $contact) 
    <tr><td><img src="{{ $contact->img }}" height="40"></td><td>{{ $contact->email }}</td><td>{{ $contact->msg }}</td></tr>
@endforeach
</table>
{{ $contacts->links() }}

@endsection