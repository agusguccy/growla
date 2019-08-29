@extends('template')

@section('contenidoPrincipal');
<link rel="stylesheet" href=href="/css/search-results.css" />
  <div class="container">
    <div class="search-results-container container">
      <h1>Resultado de búsqueda</h1>
      @if(isset($beer))
      <p class="search-results-count">Resultado(s):</p>

      <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Tipo</th>
          <th>Descripción</th>
          <th>IBUs</th>
          <th>Graduación Alcohólica</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($beer as $oneBeer)
          <tr>
            <td>{{ $oneBeer->type }}</td>
            <td>{{ str_limit($oneBeer->description,80) }}</td>
            <td>{{ $oneBeer->IBUs }}</td>
            <td>{{ $oneBeer->alcohol_content }}</td>
          </tr>

        @endforeach
      </tbody>
    </table>
      @elseif(isset($message))
			   <p>{{ $message }}</p>


      @endif

  </div>
</div>


@endsection
