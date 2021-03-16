@extends("admin.master")

@section("content")

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT INTERN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Intern</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!--data table-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                   
               <form  method="post" action="{{url('admin/intern/update')}}" enctype="multipart/form-data">

                  @csrf
                    <input type="hidden" name="id" value="{{$edit->id}}">

              Name:    
              <input class="form-control" type="text" name="name" value="{{$edit->name}}"><br>

              Company Name:    
              <input class="form-control" type="text" name="company_name" value="{{$edit->company_name}}"><br>

              Designation:
              <input class="form-control" type="text" name="designation" value="{{$edit->designation}}"><br>

              Image:
              <img src="{{ url('/upload/'.$edit->image) }}" style="height: 150px; width: 150px; border-radius: 60px;"><br>
              <input class="form-control" type="file" name="image"><br>

               <input class="form-control btn btn-success" type="submit" name="update" value="UPDATE">
        </form> 

               </form> 
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

<!-- ------End Data Table------- -->

  </div>

  <!-- /.content-wrapper -->
 
  </body>
  </html>

@endsection