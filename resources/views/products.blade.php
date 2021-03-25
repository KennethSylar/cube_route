@extends('layouts.app')

@section('content')
    <products-component :api-data="{{$data}}"></products-component>
@endsection
