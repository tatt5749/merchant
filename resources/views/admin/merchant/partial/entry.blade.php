            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('merchant_name')
                       -> label(trans('merchant::merchant.label.merchant_name'))
                       -> required()
                       -> placeholder(trans('merchant::merchant.placeholder.merchant_name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('username')
                       -> label(trans('merchant::merchant.label.username'))
                       -> required()
                       -> placeholder(trans('merchant::merchant.placeholder.username'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::password('password')
                       -> label(trans('merchant::merchant.label.password'))
                       -> required()
                       -> placeholder(trans('merchant::merchant.placeholder.password'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::password('email')
                       -> label(trans('merchant::merchant.label.email'))
                       -> required()
                       -> placeholder(trans('merchant::merchant.placeholder.email'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('address')
                       -> label(trans('merchant::merchant.label.address'))
                       -> placeholder(trans('merchant::merchant.placeholder.address'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('information')
                       -> label(trans('merchant::merchant.label.information'))
                       -> placeholder(trans('merchant::merchant.placeholder.information'))!!}
                </div>

                <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="file" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('merchant::merchant.label.img') }}
                        </label>
                        <div class='col-lg-3 col-sm-12'>
                            {!! $merchant->files('file')
                            ->mime(config('filer.allowed_extensions'))
                            ->url($merchant->getUploadUrl('file'))
                            ->dropzone()!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                            {!! $merchant
                            ->files('file')
                            ->editor()!!}
                        </div>
                    </div>
                </div>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::tel('phone')
                       -> label(trans('merchant::merchant.label.phone'))
                       -> placeholder(trans('merchant::merchant.placeholder.phone'))!!}
                </div>
            </div>