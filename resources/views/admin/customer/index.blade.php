@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Customers</h2>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All Customer Student</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Email</th>
          <th scope="col">Registered</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
        <tr>
          <td>{{$customer->id}}</td>
          <td>{{$customer->name}}</td>
          <td>{{$customer->phone}}</td>
          <td>{{$customer->email}}</td>
          <td>{{$customer->created_at}}</td>
          <td>
              @if($customer->status == 0)
              Pending
              @elseif($customer->status == 1)
              Approved
              @endif
          </td>
          <td>
            @if($customer->status == 0)
            <a href="/admin/user/edit/{{$customer->id}}" class="btn btn-success btn-sm" onClick="return confirm('Are you want to approved?')"><i class="fa fa-check"></i></a>
            @elseif($customer->status == 1)
            <a href="/admin/user/edit/{{$customer->id}}" class="btn btn-warning btn-sm"><i class="fa fa-times" onClick="return confirm('Are you want to unapproved?')"></i></a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection