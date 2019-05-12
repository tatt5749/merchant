    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('merchant::merchant.name') !!}</a></li>
            <div class="box-tools pull-right">
                                @include('merchant::admin.merchant.partial.workflow')
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#merchant-merchant-entry' data-href='{{guard_url('merchant/merchant/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($merchant->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#merchant-merchant-entry' data-href='{{ guard_url('merchant/merchant') }}/{{$merchant->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#merchant-merchant-entry' data-datatable='#merchant-merchant-list' data-href='{{ guard_url('merchant/merchant') }}/{{$merchant->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('merchant-merchant-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('merchant/merchant'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('merchant::merchant.name') !!}  [{!! $merchant->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('merchant::admin.merchant.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>