@extends('layouts.app')

@section('mainSection')
@include('layouts.banner')


<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8  mb-5 mb-lg-0">
                <h2 class="h5 section-title">Recent Post</h2>

@foreach ($posts as $post)
<article class="card mb-4">
    <div class="post-slider">
        <img src="{{ asset('post_thambnil/'.$post->thambnil )}}" class="card-img-top" alt="post-thumb">
    </div>
    <div class="card-body">
        <h3 class="mb-3"><a class="post-title" href="{{ route('single_post_view', $post->id)}}">{{ $post->title}}</a></h3>
        <ul class="card-meta list-inline">
            <li class="list-inline-item">
                <i class="ti-calendar"></i>{{ date('d M Y', strtotime($post->created_at))}}
            </li>
            <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                    <li class="list-inline-item"><a href="#">Category: <span class="text-primary">{{ $post->category_name}}</span></a></li>
                </ul>
            </li>
        </ul>
        <p>
        @php
            echo $post->description;
       @endphp
        </p>
        <a href="{{ route('single_post_view', $post->id)}}" class="btn btn-outline-primary">Read More</a>
    </div>
</article>
@endforeach

<div class="mt-5">
    {{$posts->links('pagination::bootstrap-5')}}
</div>

            </div>
            {{-- Rightbar --}}
            @include('layouts.rightbar')
        </div>
    </div>
</section>

@endsection
