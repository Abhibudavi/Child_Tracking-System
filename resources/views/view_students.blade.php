@extends('layouts.app')

@section('content')
<div class="row" style="margin-left: 20px;margin-right: 20px">
@if (Session::has('status'))
    <div class="alert alert-info">{{ Session::get('status') }}</div>
@endif
  <div class="col-mid-12">
  <div class="panel panel-success">
  <div class="panel-heading" style=" background-color: rgba(25, 177, 128, 0.93);"><font color="white">Students</font></div>
      <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>
      Sr.No
      </th>
      <th>
       SID
      </th>
      <th>
        Name        
      </th>
      <th>
        Standard
      </th>
      <th>
        Division
      </th>
      <th>
        Roll No
      </th>
      <th>
        Mobile No
      </th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; ?>
  @foreach($students as $student)
    <tr>
    <td>
      {{$i}}
    </td>
      <td>



       {{$student->sid}}
      </td>
      <td>
        {{$student->name}}
      </td>
      <td>
        {{$student->std}}
      </td>
      <td>
        {{$student->division}}
      </td>
      <td>
        {{$student->roll_no}}
      </td>
      <td>
        {{$student->mob_no}}
      </td>
      <td>
        
        <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$student->sid}}">Delete</button>

          <!-- Modal -->
          <div id="myModal{{$student->sid}}" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Delete <b>{{$student->name}}</b></h4>
                </div>
                <div class="modal-body">
                  <p>Are You Sure want to delete this record?</p>
                </div>
                <div class="modal-footer">
                 <a href="/delete_student/{{$student->name}}/{{$student->sid}}" class="btn  btn-danger">Yes</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
              </div>

            </div>
          </div>
      </td>
    </tr>
    <?php $i++; ?>
    @endforeach
  </tbody>
</table>
  </div>
  </div>  
</div>
@endsection
