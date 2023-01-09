@extends('customer.layout')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>E-store</h2>
            </div>
        </div>
    </div>
   <br>
  
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Price</th>
            <th>Delivery person</th>
            <th>Status</th>
        </tr>
        @php($i=0)
       @foreach($orders as $order)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$order->Pname}}</td>
            <td>{{$order->detail}}</td>
            <td>{{$order->price}}</td>
           <td>{{$order->name}}</td>
         @if($order->status=='no_update')
           <td> <a class="btn btn-info" href="{{ route ('changestatus' ,['ord'=>$order->id]) }}">Cancel Order</a>    </td>
           @elseif($order->status=='Delivered')
        <td>Delivered</td>
        @elseif($order->status=='Cancelled')
        <td>Cancelled</td>
        @endif
        </tr>
        @endforeach
      

    </table>
    @endsection
    