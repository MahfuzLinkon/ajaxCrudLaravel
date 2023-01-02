// $('#addHeader').show();
// $('#updateHeader').hide();
// $('#addBtn').show();
// $('#updateBtn').hide();

function showAddOption(){
    $('#addHeader').show();
    $('#updateHeader').hide();
    $('#addBtn').show();
    $('#updateBtn').hide();
}
showAddOption();

function showUpdateOption(){
    $('#addHeader').hide();
    $('#updateHeader').show();
    $('#addBtn').hide();
    $('#updateBtn').show();
}



$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function getAllTeacher(){
    $.ajax({
        // url:"{{ route('teacher.all') }}",
        url:"/teacher/all",
        type: "get",
        dataType: "JSON",
        success:function(response){
            let data = '';
            $.each(response, function(key, value){
                // console.log(value);
                key = key + 1;
                data += '<tr>';
                data += '<td>'+key+'</td>';
                data += '<td>'+value.name+'</td>';
                data += '<td>'+value.title+'</td>';
                data += '<td>'+value.institute_name+'</td>';
                data += '<td>';
                data += '<a class="btn btn-info" onclick="editTeacher('+value.id+')">Edit</a>';
                data += '<a class="btn ms-2 btn-danger" onclick="deleteTeacher('+value.id+')">Delete</a>';
                data += '</td>';
                data += '</tr>';
            });
            $('tbody').html(data);
        }
    })
}
getAllTeacher();

function resetForm(){
    $('#name').val('');
    $('#title').val('');
    $('#instituteName').val('');
}

function resetErrors(){
    $('#nameError').text('');
    $('#titleError').text('');
    $('#institutError').text('');
}


function addTeacher(){
    let name = $('#name').val();
    let title = $('#title').val();
    let instituteName = $('#instituteName').val();
    $.ajax({
        url: "/add/teacher",
        dataType: "json",
        type: "POST",
        data:{name: name, title: title, institute_name: instituteName},
        success:function(response){
            getAllTeacher()
            resetForm()
            resetErrors()

            // msg ----------
            const Msg = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Teacher Added Successfully !',
                showConfirmButton: false,
                timer: 1500
            })
            Msg.fire({
                type: 'success',
                title: 'Teacher Added Successfully !',
            })
            // end msg

        }, error: function(error){
            resetErrors()
            $('#nameError').text(error.responseJSON.errors.name);
            $('#titleError').text(error.responseJSON.errors.title);
            $('#institutError').text(error.responseJSON.errors.institute_name);
        }
    })
}


function editTeacher(id){
    

    $.ajax({
        url:"/edit/teacher",
        type:"post",
        dataType: "JSON",
        data: {id: id},
        success: function(response){
            showUpdateOption();

            $('#id').val(response.id);
            $('#name').val(response.name);
            $('#title').val(response.title);
            $('#instituteName').val(response.institute_name);
        }
    })
}

function updateTeacher(){
    let id = $('#id').val();
    let name = $('#name').val();
    let title = $('#title').val();
    let instituteName = $('#instituteName').val();

    $.ajax({
        url:"/update/teacher",
        type: "POST",
        dataType: "JSON",
        data: {id: id, name: name, title: title, institute_name: instituteName},
        success: function(response){
            console.log("Data update Successfully");
            getAllTeacher()
            resetForm()
            resetErrors()
            showAddOption()
             // msg ----------
             const Msg = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: 'Teacher Added Successfully !',
                showConfirmButton: false,
                timer: 1500
            })
            Msg.fire({
                type: 'info',
                title: 'Teacher Updated Successfully !',
            })
            // end msg
        }, error: function(error){
            resetErrors()
            $('#nameError').text(error.responseJSON.errors.name);
            $('#titleError').text(error.responseJSON.errors.title);
            $('#institutError').text(error.responseJSON.errors.institute_name);
        }
    })
}

function deleteTeacher(id){
    confirm('Are you sure?');
    $.ajax({
        url: "/teacher/delete/"+id,
        type: "delete",
        dataType: "JSON",
        success: function(response){
            getAllTeacher()
             // msg ----------
             const Msg = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Teacher Added Successfully !',
                showConfirmButton: false,
                timer: 1500
            })
            Msg.fire({
                type: 'success',
                title: 'Teacher Deleted Successfully !',
            })
            // end msg
        }
    });
}

