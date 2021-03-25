@extends('layouts.app')

@section('content')
  @if(isset($data))
    <new-category-component :api-data="{{$data}}"></new-category-component>
  @else
    <new-category-component></new-category-component>
  @endif
@endsection
