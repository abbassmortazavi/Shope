@extends('admin.master')

@section('script')
    <script>
        $(document).ready(function () {
            $('#permission_id').selectpicker();
        })
    </script>
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">

                </div>
                <h1 class="page-header float-right">ویرایش دسترسی</h1>

            </div>

            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <form name="campaignForm" action="{{ route('permissions.update' , $permission->id) }}" class="form-horizontal" method="post"
                      id="form-create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    @include('admin.section.errors')
                    <div class="form-group">
                        <label for="title" class="control-label">عنوان مقام</label>
                        <input type="text" class="form-control" id="title" name="name"
                               placeholder="عنوان را وارد کنید..."
                               value="{{ $permission->name }}">
                    </div>

                    <div class="form-group">
                        <label for="title" class="control-label">عنوان مقام</label>
                        <input type="text" class="form-control" id="title" name="label"
                               placeholder="توضیحات را وارد کنید..."
                               value="{{ $permission->label }}">
                    </div>

                    <div class="col-lg-12">
                        <button id="send" type="submit" class="btn btn-warning">ویرایش دسترسی</button>
                    </div>

                </form>
            </div>
            <!-- /.col-lg-12 -->

            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@section('script')
    {{--<script>
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#send").click(function (e) {

            e.preventDefault();

            var form = document.forms.namedItem("campaignForm"); // high importance!, here you need change "yourformname" with the name of your form
            var formData = new FormData(form); // $('form')[0] high importance!

            $.ajax({
                type: 'post',
                url: "{{ route('articles.store') }}",
                //dataType: "json", // or html if you want...
                contentType: false, // high importance!
                data: formData, // high importance!
                processData: false, // high importance!
                success: function (data) {
                    //console.log(data);
                    alert(data.success);

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });



    </script>--}}


@endsection