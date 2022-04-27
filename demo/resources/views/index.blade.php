@include('header')

<div class="container">
  <h2>Company</h2><a href="addstudent" class="btn btn-primary">Add Company</a>
  @if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
   <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email Id</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Designation</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($companies as $comp)
      <tr>
        <td>{{$comp->id}}</td>
        <td>{{$comp->name}}</td>
        <td>{{$comp->email}}</td>
        <td>{{$comp->password}}</td>
        <td>{{$comp->gender}}</td>
        <td>{{$comp->designation}}</td>
        <td><img src="img/{{$comp->photo}}" style="height:100px;width:100px"></td>
        <td><a class="btn btn-primary" href="editcompany/{{$comp->id}}">Edit</a>
        <a class="btn btn-danger" href="deletecompany/{{$comp->id}}">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
