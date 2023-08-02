@extends('admin.layouts.app')

@section('title')
    Messages
@endsection

@php
    $page = 'messages';
@endphp

@section('content')
    <div class="card">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert" id="myElement">
                    {{session()->get('success') }}
                </div>
            @endif
        <div class="card-header d-flex align-items-center justify-content-between">
            <h4 class="card-title">All Messages</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Name & Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $key => $message)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                @if($message->user_photo == null)
                                <img src="{{ asset('images/user_photos/default.jpg')}}" alt="" style="width:50px; height:50px;" class="rounded-circle">
                                @else
                                <img src="{{ asset('images/user_photos/'.$message->user_photo)}}" alt="" style="width:50px; height:50px;" class="rounded-circle">
                                @endif
                                {{-- <img src="{{ asset('images/user_photos/'.$message->user_photo)}}" alt="" style="width:100px; height:80px;" class="rounded-circle"> --}}
                            </td>
                            <td>
                                {{ $message->user_name }}<br>
                                <small>{{ $message->user_email }}</small>
                            </td>
                            <td>{{ $message->subject }}</td>
                            <td>
                                @php
                                    echo $message->message;
                                @endphp
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-info btn-sm mr-1" href="mailto:{{ $message->user_email }}" target="blank">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name=" _method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
