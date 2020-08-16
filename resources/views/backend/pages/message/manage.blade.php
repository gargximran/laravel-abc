@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manage Message</h4>
        </div>
    </div>
    <!-- title row end -->

    <!-- main card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">

                             <!-- delete message -->
                             @if( session()->has('delete') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> {{ session()->get('delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-dark">
                                <thead class="text-center">
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $i = 1 ;
                                    @endphp
                                    @foreach( $messages as $message )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ Str::limit($message->message, 50) }}</td>
                                        <td>

                                            <!-- view message modal start -->
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#viewmessage{{ $message->id }}">View</button>
                                            <div class="modal fade" id="viewmessage{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
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
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- view message modal end -->

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletemessage">Delete</button>
                                            <!-- Modal -->
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
                                        </td>
                                    </tr>
                                    @php 
                                        $i++ ;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
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