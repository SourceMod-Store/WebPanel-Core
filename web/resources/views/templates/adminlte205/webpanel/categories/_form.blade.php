<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$LeftMenuTitle}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('priority', 'Priority') !!}
                    {!! Form::text('priority', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('display_name', 'Display Name') !!}
                    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('require_plugin', 'Require Plugin') !!}
                    {!! Form::text('require_plugin', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('web_description', 'Web Description') !!}
                    {!! Form::text('web_description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('web_color', 'Web Color') !!}
                    {!! Form::text('web_color', null, ['class' => 'form-control']) !!}
                </div>
                <div class="box-footer">
                    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->