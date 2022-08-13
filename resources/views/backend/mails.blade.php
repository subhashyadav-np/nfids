@extends('layouts.backend', [$title = "All Mails"])

@section('content')

<div class="row">

    <div class="col-lg-12">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Recieve On</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($Emails as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->f_name}} {{$item->l_name}}</td>
                        <td>{{$item->subject}}</td>
                        <td>
                            <div style="white-space: pre-wrap;">{{$item->message}}</div>
                        </td>
                        <td>
                            @if ($item->status == 'unread')
                            <a onclick="return confirm('Are you sure you have read this mail?')" href="{{route('mail.show', $item->id)}}" class="badge badge-pill badge-danger">mark as read <i class="fa fa-eye-slash"></i></a>
                            @endif
                            @if ($item->status == 'read')
                                <span class="badge badge-pill badge-success">marked as read <i class="fa fa-eye"></i></span>
                            @endif
                        </td>
                        <td>
                            @php
                            $recieveDate = $item->created_at;
                            $date = date('d M, Y', strtotime($recieveDate));
                            echo $date;
                            @endphp
                        </td>
                        <td>
                            <a href="mailto:{{$item->email}}" class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-placement="bottom" title="Reply sender via email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="tel:{{$item->phone}}" class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-placement="bottom" title="Make phone call to sender">
                                <i class="fas fa-phone-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-placement="bottom" title="Delete This Email">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-lg-12 mt-2">
        <a href="#" class="btn btn-primary text-white"><i class="fa fa-print"></i> Print Emails</a>
    </div>

</div>
    
@endsection