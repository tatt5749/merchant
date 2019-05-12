<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">  {!! trans('merchant::merchant.names') !!} [{!! trans('merchant::merchant.text.preview') !!}]</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#merchant-merchant-entry' data-href='{!!guard_url('merchant/merchant/create')!!}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }} </button>
        </div>
    </div>
</div>