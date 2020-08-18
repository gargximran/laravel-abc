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

                    <!-- delete message row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletemessage">Delete</button>
                            <div class="modal fade" id="deletemessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure want to this this message?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('message.delete', $message->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Yes</button>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- delete message row end -->

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

@endsection  