@extends('admin.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <a href="{{ route('permissions.create') }}" class="btn btn-info">ایجاد دسترسی</a>
                </div>
                <h1 class="page-header float-right">دسترسی ها</h1>

            </div>

            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>نام دسترسی</th>
                            <th>توضیحات</th>
                            <th> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)

                            <tr>
                                <td><a href="{{ $permission->name }}"></a>{{ $permission->name }}</td>
                                <td>{{ $permission->label }}</td>
                                <td>
                                    <form action="{{ route('permissions.destroy',$permission->id) }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <a href="{{ route('permissions.edit' , $permission->id) }}"
                                               class="btn btn-primary">ویرایش</a>
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </div>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.col-lg-12 -->
            <div class="text-center">
                {!! $permissions->render() !!}
            </div>

            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection

