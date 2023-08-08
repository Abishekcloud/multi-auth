@extends('layouts.admin')

@section('postscontent')

<div class="p-6 sm:ml-64">
    <div class="p-8 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
       <div class="grid grid-cols-2 gap-4">

        <h1>Author's Posts are Displayed Here</h1>
       </div>

       <style>
        .post {
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            width: 300px;
        }

        .dp img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .name {
            font-weight: bold;
        }

        .post-content {
            margin-bottom: 10px;
        }

        .post-content img {
            max-width: 100%;
            height: auto;
        }

        .post-bottom {
            display: flex;
            justify-content: space-between;
        }
    </style>

{{-- Errors message --}}
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

{{-- Success Message --}}
       @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@foreach ($posts as $post)
    <div class="post">
        <div class="post-top">
            <div class="dp">
                <img src="./images/dp.jpg" alt="">
            </div>
            <div class="post-info">
                <p class="name">{{$post->first_name}} {{$post->last_name}}</p>
                {{-- <span class="time">{{$post->created_at}}</span> --}}
            </div>
        </div>

        <div class="post-content">
            <img src="{{$post->image}}" alt="{{$post->image}}">
        </div>

        <div class="post-bottom">
            <div class="action">
                <a class="btn btn-outline-secondary" href="#"> View</a>
            </div>
            <div class="action">
                <a class="btn btn-outline-primary" href="#"> Edit</a>
            </div>
            <div class="action">
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endforeach

    </div>



 </div>


