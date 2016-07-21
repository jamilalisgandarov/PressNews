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
        <th>Verify</th>
      </tr>
    </thead>
    <tbody>
        <?php $count=1 ?>
        @foreach($authors as $author)
            <tr>
                <td><?php echo $count;$count=$count+1 ?></td>
                <td>{{$author->first_name}}</td>
                <td>{{$author->last_name}}</td>
                <td>{{$author->email}}</td>
                     <td><a href='/insert/{{$author->id}}' class="btn btn-success">Accept</a>&nbsp<a data class="btn btn-danger delete"  data-toggle="modal" data-target="#myModal"  value='{{$author->id}}'>Reject</a></td>
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
        <p >Do you want to delete <span id='authorData'></span> </p>
      </div>
      <div class="modal-footer">
        <a type="button"  class="btn btn-danger deleteUser" >Delete</a>
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
                url: '/authorData',
                type: 'POST',          
                dataType:'json',
                data: {id: $(this).attr('value')},
                success:function(authorData) {
                $('#authorData').empty();    
                $('#authorData').append("<b>"+authorData.first_name+" "+authorData.last_name+"</b>");
                $authorData=authorData.id;
                $('.deleteUser').attr('href', '/delete/'+$authorData+'');
                $('.delete').click(function(authorData) {
                   $.ajax({
                       url: '/delete/'+$authorData+'',
                       type: 'GET',
                       data: {},
                   })
                   .done(function() {
                       console.log("success");
                   })
       
                   
                });
                },           
        });
        });
            })
</script>
@endsection
