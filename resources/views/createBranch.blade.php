@extends('layouts.auth')

@section('content')
<div class="container">
<a class="btn btn-success" 
data-href="{{action('EmployeeController@create')}}"
href="javascript:void(0)" id="createNewProduct"> Create New Emoployee</a>
<table id="data-table" class="table table-striped table-bordered data-table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>            
                <th>Branch Name</th>
                <th>Manager</th>
                <th>Manager Start Date</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
           
           </tbody>
    </table>
</div>
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Branch Name</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" name='first_name' id="name">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Manager</label>
                        <div class="col-sm-12">
                        <select class="custom-select" id="manager" name='manager'>
                            <option selected value='M'>M</option>
                            <option value="F">F</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employees.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'birth_date', name: 'birth_date'},
            // {data: 'email', name: 'email'},
            {data: 'sex', name: 'sex'},
            {data: 'salary', name: 'salary'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
       
    });
    $('#createNewProduct').click(function () {
        $('#saveBtn').val("Add");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Add New Employee");
        $('#ajaxModel').modal('show');
    });

    //save modal information
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
         $.ajax({
          data: $('#productForm').serialize(),
          url: "{{ route('employees.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
                alert("Hello");
              $('#productForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    $('body').on('click', '.deleteProduct', function () {
     
     var product_id = $(this).data("id");
     confirm("Are You sure want to delete !");
   
     $.ajax({
         type: "DELETE",
         url: "{{ route('employees.store') }}"+'/'+product_id,
         success: function (data) {
             table.draw();
         },
         error: function (data) {
             console.log('Error:', data);
         }
     });
 });
  });
  
        </script>
@endsection