@extends('master')

@section('content')
    <div class="container">
        <form id="uploadForm" name="uploadForm" method="POST" action="{{ route('dashboard.upload.create') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- 1. Text Input -->
            <div class="form-group">
                <label for="filename">Name</label>
                <input type="text" class="form-control" name='name' id="name" aria-describedby="Filename" placeholder="Filename">
                <small id="Filename" class="form-text text-muted">Enter file name</small>
            </div>
            @if ($errors->has('name'))
                <span class="help-block">
                       <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif
            <!-- 6. File Upload -->
            <div class="form-group">
                <label for="fileupload">Upload File</label>
                <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileupload">
                <small id="fileupload" class="form-text text-muted">Choose the file from your computer and the browse
                    screen depends on your operating system.
                </small>
                @if ($errors->has('image'))
                    <span class="help-block">
                       <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group">
                <label for="multipleselect">Multiple Select from List</label>
                <select class="form-control" name="multipleselect" id="multipleselect">
                    <option value="usr">Upload User</option>
                    <option value="org">Upload Organization</option>
                    <option value="sys">Upload System</option>
                </select>
            </div>
            @if ($errors->has('multipleselect'))
                <span class="help-block">
                       <strong>{{ $errors->first('multipleselect') }}</strong>
                    </span>
        @endif
            <!-- 9. Submit Button -->
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    </div>

@endsection