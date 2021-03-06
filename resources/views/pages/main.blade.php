@extends('layouts.admin_layout')

@section('title', 'Dashboard')

@section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Main</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Main</li>
                </ol>

                <form action="{{ route('admin.main.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}    
                    
                <div class="row">
                    <div class="form-group col-md-3 mt-3">
                        <h4>Background Image</h4>
                        <img style="height:30vh" src="{{(@$main->bg_img)?url($main->bg_img):asset("assets/img/bg_img.jpg")}}" class="img-thumbnail" >
                        <input class="mt-3" type="file" id="bg_img" name="bg_img">
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <h4>Logo</h4>
                        <img style="height:30vh" src="{{(@$main->logo)?url($main->logo):asset("assets/img/logo.png")}}" class="img-thumbnail" >
                        <input class="mt-3" type="file" id="logo" name="logo">
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <div class="mb-3">
                            <label for="title"><h4>Title</h4></label>
                            <input type="text"  id="title" name="title" value="{{(@$main->title)?$main->title:"Asif Talukdar"}}"
                            class="form-control">
                        </div>

                        <div class="mb-4">
                            <label for="sub_title"><h4>Sub Title</h4></label>
                            <input type="text" id="sub_title" name="sub_title" value="{{ (@$main->sub_title)?$main->sub_title:"Welcome To My Portfolio" }}"
                            class="form-control">
    
                        </div>
                        <div>
                            <h4>Upload Resume</h4>
                            <input class="mt-2" type="file" id="resume" name="resume">
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-5">
            </div>
        </form>
        </main>
@endsection              