@extends('layout/layout')
@section('container')
<div class="row">
   <div class="col-md-12">
      <!-- DATA TABLE -->
      <h3 class="title-5 m-b-35">Member</h3>
      <div class="table-data__tool">
         <div class="table-data__tool-right">
            <button id="btnShowForm" class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>add new</button>
         </div>
         <div class="table-data__tool-right">
            <button id="bulkDelete" class="au-btn au-btn-icon au-btn--red au-btn--small">
            <i class="zmdi zmdi-plus"></i>Bulk Delete</button>
         </div>
      </div>
      <!-- Add Form (initially hidden) -->
      <div id="addForm" style="display: none;">
         <div class="alert alert-success" id="message" style="display: none;" role="alert">
         </div>
         <div class="card">
            <div class="card-header">
               <strong>Form</strong>
            </div>
            <div class="card-body card-block">
               <form id="frm" action="{{ url('members_submit') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                  @csrf
                  <div class="row form-group">
                     <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">First Name</label>
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="text" id="first_name" name="first_name" required placeholder="Enter First Name" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Last Name</label>
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="text" id="last_name" name="last_name" required placeholder="Enter Last Name" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Contact No</label>
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="text" id="contact_number"  name="contact_number" required placeholder="Enter Contact No" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Email ID</label>
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="email" id="email"  name="email" required placeholder="Enter Email ID" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Category</label>
                     </div>
                     <div class="col-12 col-md-9">
                        <select name="category_id" id="select" required class="form-control">
                           <option value="" disabled selected>Select Category</option>
                           @foreach ($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                           @endforeach
                        </select>
                        <div class="invalid-feedback">Please select a category.</div>
                     </div>
                  </div>
                  <div class="card-footer">
                     <button type="submit" id="frmSubmit" class="btn btn-primary btn-sm">Save</button>
                     <button type="reset" id="btnCancel" class="btn btn-danger btn-sm">Cancel</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      @if(count($members) > 0)
      <div id="listingTable" class="table-responsive table-responsive-data2">
         <table class="table table-data2">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Select</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Contact No</th>
                  <th>Email</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($members as $index => $member)
               <tr id="{{ $member->id }}" class="tr-shadow">
                  <td><span>{{ $index + 1 }}</span></td>
                  <td>
                     <label class="au-checkbox">
                     <input type="checkbox" class="form-control bulk-delete-checkbox" data-id="{{ $member->id }}">
                     <span class="au-checkmark"></span>
                     </label>
                  </td>
                  <td>
                     <span class="editSpan first_name">{{ $member->first_name }}</span>
                     <input class="form-control editInput first_name" type="text" name="first_name" value="{{ $member->first_name }}" style="display: none;">
                  </td>
                  <td>
                     <span class="editSpan last_name">{{ $member->last_name }}</span>
                     <input class="form-control editInput last_name" type="text" name="last_name" value="{{ $member->last_name }}" style="display: none;">
                  </td>
                  <td>
                     <span class="editSpan contact_number">{{ $member->contact_number }}</span>
                     <input class="form-control editInput contact_number" type="text" name="contact_number" value="{{ $member->contact_number }}" style="display: none;">
                  </td>
                  <td>
                     <span class="editSpan email">{{ $member->email }}</span>
                     <input class="form-control editInput email" type="text" name="email" value="{{ $member->email }}" style="display: none;">
                  </td>
                  <td>
                     <span class="editSpan category_name">{{ $member->category_name }}</span>
                     <select class="form-control editInput category_name" name="category_id" style="display: none;">
                        <option value="0">Select</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $member->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                        </option>
                        @endforeach
                     </select>
                  </td>
                  <td>
                     <span class="editSpan status">{{ $member->status == 1 ? 'Active' : 'Inactive' }}</span>
                     <select class="form-control editInput status" name="status" style="display: none;">
                     <option value="1" {{ $member->status == 1 ? 'selected' : '' }}>Active</option>
                     <option value="0" {{ $member->status == 0 ? 'selected' : '' }}>Inactive</option>
                     </select>
                  </td>
                  <td>
                     <button class="btn btn-info editBtn">Edit</button>
                     <button class="btn btn-danger deleteBtn">Delete</button>
                     <button class="btn btn-success saveBtn" style="display: none;">Save</button>
                     <button class="btn btn-danger confirmBtn" style="display: none;">Confirm</button>
                     <button class="btn btn-secondary cancelBtn" style="display: none;">Cancel</button>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      @else
      <div class="alert alert-info">
         No members found.
      </div>
      @endif
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
   function updateStatusText() {
       $('.editSpan.status').each(function () {
           var selectValue = $(this).siblings('.editInput.status').val();
           var statusText = selectValue == 1 ? 'Active' : 'Inactive';
           $(this).text(statusText);
       });
   }
   function updateCategoryText() {
       $('.editSpan.category_name').each(function () {
           var selectValue = $(this).siblings('.editInput.category_name').val();
           var categoryName = $(this).siblings('.editInput.category_name').find('option:selected').text();
           $(this).text(categoryName);
       });
   }
    $('#bulkDelete').on('click', function () {
        var selectedIds = [];
        $('.bulk-delete-checkbox:checked').each(function () {
            selectedIds.push($(this).data('id'));
        });
   
        if (selectedIds.length > 0) {
            if (confirm("Are you sure you want to delete selected items?")) {
                // Perform the bulk delete operation using Ajax
                $.ajax({
                    type: 'POST',
                    url: '{{ url('bulk-delete') }}',
                    data: { ids: selectedIds },
                    success: function (response) {
                        if (response.status == 1) {
                            // Remove the deleted rows from the table
                            for (var i = 0; i < selectedIds.length; i++) {
                                $('#' + selectedIds[i]).remove();
                            }
                        } else {
                            alert(response.msg);
                        }
                    }
                });
            }
        } else {
            alert("Please select items to delete.");
        }
    });
   
   
   $(document).ready(function(){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
   
       $('#btnShowForm').on('click', function () {
           $('#listingTable').hide();
           $('#addForm').show();
       });
   
       $('#btnCancel').on('click', function () {
           $('#listingTable').show();
           $('#addForm').hide();
       });
   
       $('#frm').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ url('members_submit') }}",
                data: formData,
                type: 'post',
                contentType: false,
                processData: false,
                success: function(result) {
                    console.log(result);
                    $('#message').html(result.msg).fadeIn();
   
                    setTimeout(function() {
                        $('#message').fadeOut();
                        $('#listingTable').show();
                        $('#addForm').hide();
                    }, 5000);
                    $('#frm')['0'].reset();
                }
            });
        });
   
       function handleEditClick(trObj) {
           trObj.find(".editSpan").hide();
           trObj.find(".editInput").show();
           trObj.find(".editBtn").hide();
           trObj.find(".deleteBtn").hide();
           trObj.find(".saveBtn").show();
           trObj.find(".cancelBtn").show();
           updateStatusText();
       }
       // Update category text on page load
       updateCategoryText();
   
       $('.editBtn').on('click', function () {
           var trObj = $(this).closest("tr");
           handleEditClick(trObj);
       });
   
       $('.saveBtn').on('click', function () {
           var trObj = $(this).closest("tr");
           var ID = trObj.attr('id');
           var inputData = trObj.find(".editInput").serialize();
           updateCategoryText();
   
           $.ajax({
               type: 'PATCH',
               url: '/members/' + ID,
               dataType: "json",
               data: 'id=' + ID + '&' + inputData,
               success: function (response) {
                   if (response.status == 1) {
                       trObj.find(".editSpan.first_name").text(response.data.first_name);
                       trObj.find(".editSpan.last_name").text(response.data.last_name);
                       trObj.find(".editSpan.contact_number").text(response.data.contact_number);
                       trObj.find(".editSpan.email").text(response.data.email);
                       trObj.find(".editSpan.category_id").text(response.data.category_id);
                       trObj.find(".editSpan.status").text(response.data.status);
   
                       trObj.find(".editInput.first_name").val(response.data.first_name);
                       trObj.find(".editInput.last_name").val(response.data.last_name);
                       trObj.find(".editInput.contact_number").val(response.data.contact_number);
                       trObj.find(".editInput.email").val(response.data.email);
                       trObj.find(".editInput.category_id").val(response.data.category_id);
                       trObj.find(".editInput.status").val(response.data.status);
   
                       trObj.find(".editInput").hide();
                       trObj.find(".editSpan").show();
                       trObj.find(".saveBtn").hide();
                       trObj.find(".cancelBtn").hide();
                       trObj.find(".editBtn").show();
                       trObj.find(".deleteBtn").show();
   
                       updateStatusText();
                   } else {
                       alert(response.msg);
                   }
                   $('#userData').css('opacity', '');
               }
           });
       });
   
       $('.cancelBtn').on('click', function () {
           var trObj = $(this).closest("tr");
   
           trObj.find(".saveBtn").hide();
           trObj.find(".cancelBtn").hide();
           trObj.find(".confirmBtn").hide();
           trObj.find(".editBtn").show();
           trObj.find(".deleteBtn").show();
   
           trObj.find(".editInput").hide();
           trObj.find(".editSpan").show();
       });
   
       $('.deleteBtn').on('click', function () {
           var trObj = $(this).closest("tr");
   
           trObj.find(".editBtn").hide();
           trObj.find(".deleteBtn").hide();
           trObj.find(".confirmBtn").show();
           trObj.find(".cancelBtn").show();
       });
   
       $('.confirmBtn').on('click', function () {
           var trObj = $(this).closest("tr");
           var ID = trObj.attr('id');
   
           $.ajax({
               type: 'DELETE',
               url: '/members/' + ID,
               dataType: "json",
               success: function (response) {
                   if (response.status == 1) {
                       trObj.remove();
                   } else {
                       trObj.find(".confirmBtn").hide();
                       trObj.find(".cancelBtn").hide();
                       trObj.find(".editBtn").show();
                       trObj.find(".deleteBtn").show();
                       alert(response.msg);
                   }
                   $('#userData').css('opacity', '');
               }
           });
       });
   });
</script>
@endsection