@extends('admin.layouts.app')

@section('title')
    Categories
@endsection

@php
    $page = 'Posts';
@endphp

@section('content')
    <div class="card">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert" id="myElement">
                    {{session()->get('success') }}
                </div>
            @endif
        <div class="card-header d-flex align-items-center justify-content-between">
            <h4 class="card-title">All Posts</h4>
            <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#AddPostModal">+ Add
                Posts</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Thambnil</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->category_name }}</td>
                            <td>
                                <img src="{{ asset('post_thambnil/'.$post->thambnil)}}" alt="" style="width:100px; height:80px;">
                            </td>
                            <td>
                                @if ($post->status ==1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif

                            </td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                        data-target="{{ '#Edit' . $post->id . 'postModal' }}"><i
                                            class="fas fa-edit"></i></button>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name=" _method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Post Edit Modal-->
                        <div class="modal fade" id="{{ 'Edit' . $post->id . 'postModal' }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $post->name }}</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name=" _method" value="put">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Post_title">Post Title</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                                    id="Post_title" placeholder="Enter Post title" value="{{ $post->title }}">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="Post_title">Post Category</label>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    {{-- <option selected disabled>Select Category</option> --}}
                                                    @foreach ($categories as $items)
                                                    <option value="{{ $items->id }}" @if ($items->id == $post->category_id) selected @endif>
                                                        {{ $items->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Category_name">Post Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                                    placeholder="Description" rows="5">{{ $post->description }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="Post_title">Post Thambnil</label>
                                                <input type="file" class="form-control-file" name="thambnil"
                                                    id="Post_thambnil" placeholder=""">
                                                    <input type="hidden" name="old_thumb" value="{{ $post->thambnil }}">
                                            </div>
                                            {{-- <div class="form-check"> --}}
                                                <label for="status" class="form-check-label">
                                                    <input type="checkbox" value="1" name="status" id="status" @if ($post->status == 1) checked @endif> Status
                                                </label>
                                            {{-- </div> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                                            <button class="btn btn-primary" href="login.html" type="submit">Update
                                                Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Category Modal-->
    <div class="modal fade" id="AddPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Post_title">Post Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="Post_title" placeholder="Enter Post title" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Post_title">Post Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $items)
                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Category_name">Post Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                placeholder="Description" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Post_title">Post Thambnil</label>
                            <input type="file" class="form-control-file" name="thambnil"
                                id="Post_thambnil" placeholder=""">
                        </div>
                        {{-- <div class="form-check"> --}}
                            <label for="status" class="form-check-label">
                                <input type="checkbox" value="1" name="status" id="status"> Status
                            </label>
                        {{-- </div> --}}
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                        <button class="btn btn-primary" href="login.html" type="submit">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
