@extends('layout.app')

@section('content')
    <edit-employee :employee="{{json_encode($employee)}}"></edit-employee>
@endsection
