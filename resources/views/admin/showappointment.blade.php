<!DOCTYPE html>
<html lang="en">

    
    <head>
        @include('admin.style')
    </head>
<!-- pembuatan form atau tabel 01 -->

@include('admin.navbar')


@include('admin.sidebar')


<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card">
                {{-- <div class="card-header"> --}}
                    <br> <br>
                    <h1 style="text-center">Appointments</h1>
                </div>
                <div class="card-body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Doctor</th>
      <th scope="col">Date</th>
      <th scope="col">Message</th>
      <th scope="col">Status</th>
      <th scope="col">User_id</th>
      <th scope="col">Approved</th>
      <th scope="col">Canceled</th>
    </tr>
  </thead>
  @foreach ($data as $appoint)
      
  <tbody>
      <tr>
          <td scope="col">{{ $appoint->name }}</td>
          <td scope="col">{{ $appoint->email }}</td>
          <td scope="col">{{ $appoint->phone }}</td>
          <td scope="col">{{ $appoint->doctor }}</td>
          <td scope="col">{{ $appoint->date }}</td>
          <td scope="col">{{ $appoint->message }}</td>
          <td scope="col">{{ $appoint->status }}</td>
          <td scope="col">{{ $appoint->user_id }}</td>
          <td> 
            <a href="" class="btn btn-success">Approved</a>
          </td>
          <td> 
            <a href="" class="btn btn-danger">Canceled</a>
          </td>
    </tr>
</tbody>
@endforeach
</table>
                    </div>
                </div>
            </div>
        </div>


@include('admin.footer')


@include('admin.script')

</html>