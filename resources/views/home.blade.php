@extends('layouts.app')

@section('content')
      @guest
        <welcome-component></welcome-component>
      @else
        <home-component></home-component>
      @endguest
@endsection
