@extends('frontend.layout.header-footer')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tra Cứu Đơn Hàng Của Bạn') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{url('/tra-cuu-don-hang')}}"  onSubmit="return valid()">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail đặt hàng') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Số điện thoại đặt hàng') }}</label>

                                <div class="col-md-6">
                                    <input id="sodienthoai" type="text" class="form-control @error('password') is-invalid @enderror" name="sodienthoai" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Tra Cứu') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function valid(){
            var sodienthoai = jQuery('#sodienthoai').val();
            var phoneFormat = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (sodienthoai == '') {
                alert("Quý khách cần nhập số điện thoại!!");
                jQuery('#sodienthoai').focus();
                return false;
            } else if (phoneFormat.test(sodienthoai) == false) {
                alert("Số điện thoại không đúng định dạng1!!");
                jQuery('#sodienthoai').focus();
                return false;
            } else if (sodienthoai.length != 10) {
                alert("Số điện thoại không đúng định dạng2!!");
                jQuery('#sodienthoai').focus();
                return false;
            }
        }
    </script>
@endsection
