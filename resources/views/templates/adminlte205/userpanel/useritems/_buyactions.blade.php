<div>
    <div style="float: right">
        {!! Form::open(['method' => 'post', 'url' => route('userpanel.useritems.buyproc', ["item_id" => $item->id])]) !!}
        {!! Form::submit('Buy',['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

    {{--<div style="float: right">--}}
        {{--{!! Form::open(['method' => 'GET', 'url' => route('userpanel.useritems.edit',$useritem->id)]) !!}--}}
        {{--{!! Form::submit('Edit ' . $useritem->id,['class' => 'btn btn-danger']) !!}--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
</div>