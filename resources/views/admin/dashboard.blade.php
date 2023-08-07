@extends('layouts.admin')

@section('postscontent')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input. <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="p-6 sm:ml-64">
    <div class="p-8 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
       <div class="grid grid-cols-2 gap-4">

        <h1>Author's Posts are Displayed Here</h1>
       </div>
    </div>
 </div>
@endsection
