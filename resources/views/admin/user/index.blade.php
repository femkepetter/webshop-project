<!-- voorbeeld dat alleen een admin een knopje kan gebruiken

@if (Auth()->user()->can('user.create'))
<button><a href="{{ Route('user.create') }}">Toevoegen</a></button>
@endif -->

<!-- @can('user.create')

@endcan -->