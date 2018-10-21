@extends('admin.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <a href="{{ route('level.create') }}" class="btn btn-primary">ثبت مقام برای کاربر</a>
                </div>
                <h1 class="page-header float-right">مدیران سایت</h1>

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
                            <th>نام کاربر</th>
                            <th>ایمیل</th>
                            <th>مقام</th>
                            <th> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            @if(count($role->users))
                                @foreach($role->users as $user)
                                    <tr>
                                        <td><a href="{{ $user->name }}"></a>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('level.edit' , $user->id) }}"
                                                       class="btn btn-primary">ویرایش</a>
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </div>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.col-lg-12 -->
            <div class="text-center">
                {!! $roles->render() !!}
            </div>

            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection

