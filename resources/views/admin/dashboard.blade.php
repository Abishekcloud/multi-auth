@extends('layouts.admin')

@section('postscontent')
    <h1>Author's Posts are Displayed Here</h1>

    @foreach ($posts as $post)
        <div class="p-6 sm:ml-64 ">
            <div class="p-8 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0">
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('admin.home') }}">
                    {{-- Image --}}
                            <div class="column">
                                <div class="profile-info">
                                    <img src="{{ asset('images/' . $post->image) }}" class="profile-image"
                                        alt="{{ $post->first_name }}" width="200px">
                                </div>
                            </div>

                    {{-- Details --}}
                            <div class="column">
                                <div class="profile-details">
                                    <h2><strong> {{ $post->first_name }} {{ $post->last_name }}</strong></h2>
                                    <p><strong> Profession: </strong><span>{{ $post->profession->name }}</span></p>
                                </div>
                                <div class="post-content">
                                    <p class="post-message"><strong> Message: </strong><span>{{ $post->message }}</span></p>
                                </div>
                            </div>

                            <div class="column">
                                <div class="post-content">
                                    <p class="post-message"><strong> Phone: </strong><span>{{ $post->phone }}</span></p>
                                </div>
                                <div class="post-content">
                                    <p class="post-message"><strong> Publication: </strong><span>{{ $post->publication }}</span></p>
                                </div>
                                <div class="post-content">
                                    <p class="post-message"><strong> Duration : </strong><span>{{ $post->duration }}</span></p>
                                </div>
                            </div>
                        </div>

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


                    <div class="post-container">
                        <div class="column"></div>
                    </div>
                </a>

            </div>
        </div>
    @endforeach
@endsection
