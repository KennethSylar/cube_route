@extends('layouts.app')

@section('content')
  @if(isset($data))
    <new-variant-component :api-data="{{$data}}"></new-variant-component>
  @else
    <new-variant-component></new-variant-component>
  @endif
@endsection
