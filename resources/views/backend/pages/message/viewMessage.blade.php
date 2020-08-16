@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Message</h4>
        </div>
    </div>
    <!-- title row end -->

    <!-- main card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- item start -->
                            <div class="message-item">
                                <h5>Name</h5>
                                <p>{{ $message->name }}</p>
                            </div>
                            <!-- item end -->
                            <!-- item start -->
                            <div class="message-item">
                                <h5>Email</h5>
                                <p>{{ $message->email }}</p>
                            </div>
                            <!-- item end -->
                            <!-- item start -->
                            <div class="message-item">
                                <h5>Website</h5>
                                <p>{{ $message->website }}</p>
                            </div>
                            <!-- item end -->
                            <!-- item start -->
                            <div class="message-item">
                                <h5>Message</h5>
                                <p>{{ $message->message }}</p>
                            </div>
                            <!-- item end -->
                        </div>
                    </div>
                    <!-- manage row end -->

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

@endsection 