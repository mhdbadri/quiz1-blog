@extends('main')

@section('title', 'Sigadget')
@section('breadcrumbs')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Photos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Photos</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content') 
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Edit Photos</strong>
                        </div>
                        <div class="pull-right">
                        <a href="{{ url('photos') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="img-wrapper">
                            <img src="{{ asset('photos_img/'.$photos->photos_title) }}">
                        </div>

                        <form action="{{ url("/photos/{$photos->photos_id}") }}" method="POST" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            
                            <div class="form-group">
                                <label>Nama Post</label>
                                <select name="photos_post_id" class="form-control">
                                    <option value="{{ $photos->post->post_id }}">{{ $photos->post->post_title }}</option>
                                    @foreach($post as $item)
                                    <option value="{{ $item->post_id }}">{{ $item->post_title}}</option>
                                    @endforeach
            
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="photos_date" class="form-control @error('photos_date')
                                is-invalid @enderror" value="{{ old('photos_date', $photos->photos_date) }}">
                                @error('photos_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Photos</label>
                                <input type="file" name="photos_title" class="form-control @error('photos_title')
                                is-invalid @enderror" value="{{ old('photos_title', $photos->photos_title) }}">
                            </div>

                            <div class="form-group">
                                <label>Keterangan Foto</label>
                                <textarea type="text" name="photos_text" class="form-control @error('photos_text')
                                is-invalid @enderror">{{ old('photos_text', $photos->photos_text)}}</textarea>
                                @error('photos_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
        
                        </form>
                    </div> 
                </div>               
            </div>
                </div>
                
             </div>
        </div>

@endsection
