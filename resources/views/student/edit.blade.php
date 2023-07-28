@extends('templates.layout')
@section('content')
    @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('route_student_edit',['id'=>$student->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $student->email }}" name="email">
        </div>
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="name" class="form-control" value="{{ $student->name }}" name="name">
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh CMND/CCCD</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="anh_preview" src="{{ $student->image?''.Storage::url($student->image):''}}" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="file_anh">
                        <label for="cmt_truoc">Mặt trước</label><br/>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Thêm</button>
    </form>
@endsection
@section('script')
    <script>
        $(function(){
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#file_anh").change(function () { //#cmt_truoc id của input file
                readURL(this, '#anh_preview'); //#mat_truoc_preview là id của ảnh để file đính vào
            });

        });
    </script>
@endsection
