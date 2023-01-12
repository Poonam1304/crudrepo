@extends('Admin.main-layout')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
           <a href="{{route('getaddform')}}"> <button class="btn btn-info mb-3" type="button" >
                        Add
                            </button></a>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('body')

<!DOCTYPE html>
<html>

<head>
    <title>userslist</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script> -->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12">
            <div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{route('users')}}" method="GET" role="search">
     @csrf
                    <div class="input-group mb-3">

                        </span>
                        <input type="text mb-3" class="form-control mr-1" name="term" placeholder="Search projects" id="term">
                        
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info mb-3" type="submit" title="Search projects">
                                search
                            </button>
                        </span>
                     
                    </div>
                </form>
            </div>
        </div>
    </div>
            </div>
            <!-- <div class="col-lg-2 col-12 ">

                <div class="mb-3">

                    <input type="search" class="form-control" id="search" name="search" placeholder="search......">
                </div>
               
            </div> -->
        </div>

        <table class="table table-striped table-bordered  table-hover data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody class="alldata" >

           
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <!-- <td><button type="button" class="btn btn-primary">Delete</button> -->
                    <td>
                        <div class="delete-modal btn  btn-sm" data-id='{{$user->id}}' id="deletecategory1" name='.$user->name.'><i class="fa fa-trash" aria-hidden="true"></i> </div><a href="{{url('edituser/'. $user->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    </td>

                    </td>
                </tr>
                <!---- delete model -------------->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ url('/delete') }}">
                                    <input type="hidden" name="userid" id="user_id" value="">
                                    @csrf
                                    <p>Are you Sure you want Delete this user?.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" value="" class="btn btn-info ">Confirm</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="3">There are no users.</td>
                </tr>
                @endforelse
            </tbody>
            <tbody id="Content" class="searchdata"></tbody>

        </table>

        <!-- 
        You can use Tailwind CSS Pagination as like here:
        {!! $users->withQueryString()->links() !!}        
    -->

        {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>

    <script type="text/javascript">
        $(document).on("click", ".delete-modal", function(e) {
            var delete_id = $(this).data('id');
            $('#user_id').val(delete_id);
            $('#myModal').modal('show');
        });
    </script>


    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
if($value){
    $('.alldata').hide();
    $('searchdata').show();
}else{
    $('.alldata').show();
    $('searchdata').hide();
}

    $.ajax({
                type: 'GET',
                url: "{{route('search')}}",
                data: {
                    'search': $value
                },
                success: function(data) {
                   $('#Content').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
<!-- simple search -->
<script>
$(document).on( "", function(e) {
          
        });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>

@endsection