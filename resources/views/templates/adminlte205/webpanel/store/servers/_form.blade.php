<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$LeftMenuTitle}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('display_name', 'Display Name') !!}
                    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('ip', 'IP') !!}
                    {!! Form::text('ip', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('port', 'Port') !!}
                    {!! Form::text('port', null, ['class' => 'form-control']) !!}
                </div>
                <div class="box-footer">
                    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->