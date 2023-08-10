@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+Add New</button>
            </ol>
          </div>
        </div>
      </div>
    </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">All Categories List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-center">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                              <th>SL.</th>
                              <th>Category Name</th>
                              <th>Icon</th>
                              <th>Home Page</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key=>$row )


                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->category_name}}</td>
                              <td><img src="{{ asset('files/category/' . $row->icon) }}"
                                width="32" height="32"></td>
                             <td>
                              @if ($row->home_page==1)
                                 <span class="badge badge-success">Home Page</span>
                              @endif
                            </td>
                              <td>
                                <a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                                <a href="{{route('category.delete',$row->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
  </div>

  <!--  category insert Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModal">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" class="form-control" name="category_name" id="category_name" placeholder="category name" required>
              <small id="emailHelp" class="form-text text-muted">Your main category</small>
            </div>
            <div class="form-group">
                <label for="icon">Category Icon</label>
                <input type="file" class="form-control" name="icon" id="icon" required>
              </div>
              <div class="form-group">
                <label for="category_name">show on homepage</label>
                <select class="form-control" name="home_page" id="home_page">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>


      </div>
    </div>
  </div>


    <!--  category Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" class="form-control" name="category_name" id="edit_category_name" >
              <input type="hidden" class="form-control" id="category_id" name="id" >
              <small id="emailHelp" class="form-text text-muted">Your main category</small>
            </div>

            <div class="form-group">
                <label for="icon">Category Icon</label>
                <input type="file" class="form-control" name="icon" id="edit_icon" >
                <input type="hidden"  id="old_icon" name="old_icon">
                <small id="emailHelp" class="form-text text-muted">Your Main Icon</small>
            </div>
            {{-- <div class="form-group">
                <label for="category_name">show on homepage</label>
                <select class="form-control" name="home_page" id="home_page">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>
              </div> --}}
              {{-- <div class="form-group">
                <label for="category_name">Show on Homepage</label>
               <select class="form-control" name="home_page">
                 <option value="1" @if($data->home_page==1) selected @endif>Yes</option>
                 <option value="0" @if($data->home_page==0) selected @endif>No</option>
               </select>
                <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>
              </div>  --}}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>


      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script type="text/javascript">
    $('body').on('click','.edit',function(){
     let cat_id=$(this).data('id');
     $.get("category/edit/"+cat_id,function(data){
             $('#edit_category_name').val(data.category_name);
             $('#old_icon').val(data.icon);
             $('#home_page').val(data.home_page);
             $('#category_id').val(data.id);
     });
    });

    </script>

@endsection