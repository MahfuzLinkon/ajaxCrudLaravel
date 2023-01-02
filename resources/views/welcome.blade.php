<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax Crud</title>
    <link rel="stylesheet" href="{{ asset('asstes/css/bootstrap.css') }}">
</head>
<body>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>Teacher List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Institute Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <span id="addHeader">Add Teacher</span>
                                <span id="updateHeader">Update Teacher</span>
                            </h3>
                        </div>
                        <div class="card-body">
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                    <div class="mt-2">
                                        <span class="text-danger" id="nameError"></span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                    <div class="mt-2">
                                        <span class="text-danger" id="titleError"></span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Institute Name</label>
                                    <input type="text" id="instituteName" name="institute_name" class="form-control">
                                    <div class="mt-2">
                                        <span class="text-danger" id="institutError"></span>
                                    </div>
                                </div>
                                <input type="hidden" name="" id="id">
                                <div class="mt-3">
                                    <input type="submit" id="addBtn" onclick="addTeacher()"  value="Add" class="form-control btn btn-success">
                                    <input type="submit" id="updateBtn" onclick="updateTeacher()" value="Update" class="form-control btn btn-primary">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('asstes/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('asstes/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('asstes/js/script.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>