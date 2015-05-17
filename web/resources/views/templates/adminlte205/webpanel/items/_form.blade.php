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
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('type', 'Type') !!}
                    {!! Form::text('type', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('loadout_slot', 'Loadout Slot') !!}
                    {!! Form::text('loadout_slot', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category ID') !!}
                    {!! Form::text('category_id', null, ['class' => 'form-control']) !!} <!-- TODO: Replace with select box-->
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Optional Entries</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('priority', 'Priority') !!}
                    {!! Form::text('priority', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('web_description', 'Web Description') !!}
                    {!! Form::text('web_description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('is_buyable', 'Is buyable') !!}
                    {!! Form::text('is_buyable', null, ['class' => 'form-control']) !!} <!-- TODO: Repalce with checkbox -->
                </div>
                <div class="form-group">
                    {!! Form::label('is_tradeable', 'Is tradeable') !!}
                    {!! Form::text('is_tradeable', null, ['class' => 'form-control']) !!} <!-- TODO: Repalce with checkbox -->
                </div>
                <div class="form-group">
                    {!! Form::label('is_refundable', 'Is refundable') !!}
                    {!! Form::text('is_refundable', null, ['class' => 'form-control']) !!} <!-- TODO: Repalce with checkbox -->
                </div>
                <div class="form-group">
                    {!! Form::label('expiry_time', 'Expiry Time') !!}
                    {!! Form::text('expiry_time', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('flags', 'Flags') !!}
                    {!! Form::text('flags', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('attrs', 'Attrs') !!}
                    {!! Form::text('attrs', null, ['class' => 'form-control']) !!} <!-- TODO: Repalce with textarea with json highlighting-->
                </div>
                <div class="box-footer">
                    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->