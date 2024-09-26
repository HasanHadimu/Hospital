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
                <div class="card-header">
                    <br> <br>
                    <h1 style="text-center">Tambah Data Dokter</h1>
                </div>
                <div class="card-body">
                        {{-- script untuk menambahkan alert ketika sukses menambahkan doctor --}}
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                x
                            </button>
                            {{ session()->get('message') }}
                        </div>  
                        @endif
                        <form action="{{ url('/upload_doctor') }}" method="post" enctype="multipart/form-data">
                        @csrf 
                            <div class="mb-2">
                                <label for="nrp" class="form-label">Doctor Name:</label>
                                <input type="text" class="form-control" name="name" id="title" required>
                            </div>

                            <div class="mb-2">
                                <label for="nama" class="form-label">Phone:</label>
                                <input type="text" class="form-control" name="phone" id="description" required>
                            </div>

                            <div class="mb-2">
                                <label>Specialist:</label>
                                <select name="specialist" id="">
                                    <option >--Select--</option>
                                    <option value="skin">skin</option>
                                    <option value="heart">heart</option>
                                    <option value="eye">eye</option>
                                    <option value="nose">nose</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="jurusan" class="form-label">Room No: </label>
                                <input type="text" class="form-control" name="room" id="discount_price" required>
                            </div>

                            <div class="mb-2">
                                <label for="image" class="form-label">Doctor Image: </label>
                                <input type="file" class="form-control" name="image" required>
                            </div>

                            <div class="mb-2">
                                <button type="submit" value="Add Doctor" class="btn btn-primary" name="submit">Add Doctor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@include('admin.footer')


@include('admin.script')

</html>