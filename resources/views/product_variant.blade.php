@extends('layouts.app')

@section('content')
    <variants-component :api-data="{{$data}}"></variants-component>
@endsection
