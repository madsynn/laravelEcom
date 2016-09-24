<section id="content">
    <div class="content-wrap">
        <div class="container  dashboard clearfix">

                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#profile" aria-expanded="true" aria-controls="profile" role="tab" data-toggle="tab">Account</a></li>
                    <li role="presentation"><a href="#security" aria-controls="security" role="tab" data-toggle="tab">Shipping Information</a></li>
                    <li role="presentation"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Orders</a></li>
                </ul>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif





            @include('frontend.account.partials.orders-tab')



        </div>
    </div>
</section><!-- #content end -->