    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#merchant" data-toggle="tab">{!! trans('merchant::merchant.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#merchant-merchant-edit'  data-load-to='#merchant-merchant-entry' data-datatable='#merchant-merchant-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#merchant-merchant-entry' data-href='{{guard_url('merchant/merchant')}}/{{$merchant->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('merchant-merchant-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('merchant/merchant/'. $merchant->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="merchant">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('merchant::merchant.name') !!} [{!!$merchant->name!!}] </div>
                @include('merchant::admin.merchant.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>