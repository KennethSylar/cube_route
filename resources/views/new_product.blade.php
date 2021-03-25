@extends('layouts.app')

@section('content')
  @if(isset($data))
    <new-product-component :api-data="{{$data}}"></new-product-component>
  @else
    <new-product-component></new-product-component>
  @endif
@endsection
