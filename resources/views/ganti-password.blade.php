@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::open(['route' => 'ganti.password', 'method' => 'post']) }}
                        <!-- /.card-header -->
                        <!-- Input addon -->
                        <div class="card card-info mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Ganti Password</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Password</label>
                                    {{ Form::password('password', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    {{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>

                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    {!! JsValidator::formRequest('App\Http\Requests\GantiPasswordValidation') !!}
@endpush
