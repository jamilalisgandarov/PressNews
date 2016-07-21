@extends('layouts.app')
@section('content')
<div class="container">
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Number</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Last login</th>
        <th>Delete user</th>
      </tr>
    </thead>
    <tbody>
      <?php $count=1 ?>
      @foreach((App\User::where('status',1)->get()) as $user)
      <tr>
        <td><?php echo $count;$count=$count+1 ?></td>
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->last_login_at}}</td>
        <td><a class='btn btn-danger delete' id='#userModal' data-toggle="modal" data-target="#myModal"  value='{{$user->id}}'>Delete</a></td>
      </tr>
      
            @endforeach
          </tbody>
        </table>
      </div>
      <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p >Do you want to delete <span class='userData'></span> </p>
      </div>
      <div class="modal-footer">
        <a type="button" id='delete' class="btn btn-danger"  >Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>    
        jQuery(document).ready(function($) {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete').click(function(event) {           
        $.ajax({
                url: '/userData',
                type: 'POST',          
                dataType:'json',
                data: {id: $(this).attr('value')},
                success:function(userData) {
                $('.userData').empty();
                $('.userData').html("<b>"+userData.first_name+" "+userData.last_name+"</b>");
                $('#delete').attr('href', '/user/delete/'+userData.id+'');
                },
            
            
        });
        });
            })
</script>
@endsection