@if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <i class="fa fa-warning"></i>
                    <h3 class="box-title">Alerts</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @foreach ($errors->all() as $error)
                        <div class="callout callout-danger">
                            <h4>An Error has been encountered</h4>
                            <p>{{$error}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif