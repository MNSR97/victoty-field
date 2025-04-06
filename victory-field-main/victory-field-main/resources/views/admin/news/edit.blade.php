@extends('layouts.admin')

@section('content')
<div class="container-fluid position-relative d-flex p-0">

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" 
                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkq65qDKJziZKpNSyjRv0RtWQg5k0um-yn7Q&s" 
                             alt="Admin Avatar" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Edit News</h6>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                </div>
                
                <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required>{{ $news->description }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Current Main Image</label>
                        @if($news->image)
                        <div>
                            <img src="{{ asset('storage/' . $news->image) }}" width="150" class="img-thumbnail mb-2">
                        </div>
                        @else
                        <p>No image uploaded</p>
                        @endif
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Current Source Logo</label>
                        @if($news->logo)
                        <div>
                            <img src="{{ asset('storage/' . $news->logo) }}" width="80" class="img-thumbnail mb-2">
                        </div>
                        @else
                        <p>No logo uploaded</p>
                        @endif
                        <input type="file" class="form-control" id="logo" name="logo">
                    </div>
                    
                    <div class="mb-3">
                        <label for="source" class="form-label">Source</label>
                        <input type="text" class="form-control" id="source" name="source" value="{{ $news->source }}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update News</button>
                </form>
            </div>
        </div>

    </div>
    <!-- Content End -->

</div>
@endsection