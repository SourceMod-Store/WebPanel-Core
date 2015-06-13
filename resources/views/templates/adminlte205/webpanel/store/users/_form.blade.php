<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$LeftMenuTitle}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('auth', 'Auth ID') !!}
                    {!! Form::text('auth', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'User Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('credits', 'User Credits') !!}
                    {!! Form::text('credits', null, ['class' => 'form-control']) !!}
                </div>
                <div class="box-footer">
                    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box-body -->
            <!--
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
            -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">User Items</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                Add new User Items

                Remove User Items
            </div><!-- /.box-body -->
            <!--
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
            -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->