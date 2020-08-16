@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manage All Subscribers</h4>
        </div>
    </div>
    <!-- title row end -->

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

    <!-- card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="overflow: scroll;height: 500px;">

                    <div class="row">
                        <div classcol-md-12>
                            <h5>Manage Subscribers</h5>
                        </div>
                    </div>

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-dark">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1 ;
                                    @endphp
                                    @foreach( $subscribers as $subscriber )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteemail{{ $subscriber->id }}">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteemail{{ $subscriber->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to this this subscribers?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('subscriber.delete', $subscriber->id) }}" method="POST">
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
    <!-- card end -->















</div>
<!-- container end-->

@endsection