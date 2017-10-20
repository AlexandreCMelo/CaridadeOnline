@extends('master')

@section('content')

    <div class="container">

      <h1>Deletar</h1>

      <form action="{{ route('organization.destroy', $organization) }}" method="delete">
        <input name="_method" type="hidden" value="DELETE">
        {{ csrf_field() }}
        <p>Tem certeza que deseja apagar {{ $organization->name }}?</p>
        <input type="submit" class="btn btn-danger" value="Deletar">
        <a href="{{ route('organization.list') }}" class="btn btn-primary">Cancelar</a>
      </form>

    </div>

@endsection
