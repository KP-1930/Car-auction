@extends('layouts.app')
@section('content')


@if ($message = Session::get('success'))
        <div class="alert alert-success" style="text-align:center;">
            <p>{{ $message }}</p>
        </div>
 @endif

 <h3 style="text-align:center;">User Grid</h3>


<div class="container">
    {{ Form::open(array('url' => 'adminsearch')) }}
    
    <div class="row mb-5 ">
    <div class="col-lg-6 ">
        <input type="name" size="40" name="name" placeholder="Search Name"  id = "search"  value="{{request('name')}}"/>
    </div> 
    <div class="col-lg-6">
    <input type="lastname" size="40" name="lastname" placeholder="Search LastName"  id = "search"  value="{{request('lastname')}}"/>
    </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
             <input type="email" size="40" name="email" placeholder="Search Email"  id = "search"  value="{{request('email')}}"/>
         </div> 
         <div class="col-lg-6">
             <select  name="role_id"   style="width:390px;height:31px">
                <option value="">Please Select Role</option>
                @foreach( App\Role::getRolesListBackend() as $key=> $value)
                <option value="{{$key}}" <?= (request('role_id') == $key) ? "selected='selected'":"" ?> > {{$value}} </option>
                @endforeach
            </select> 
        </div>
    </div>

    <div class="row justify-content-right ml-0">
    <button type="submit"  class="btn btn-primary mt-5">Search</button>
    </div>

    <!-- </form> -->
    {{ Form::close() }}

</div> 

       

 <div class="d-flex row">
  <div class="ml-auto p-4 column">
    <a href="{{ route('create')}}" class="btn btn-success" >Add</a>       
    <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Generate PDF</a>
  </div>
 </div>
 

<table class="table table-striped">
   <thead>
    <tr>
        <th width="280px">Id</th>
        <th width="280px">First Name</th>
        <th width="280px">Last Name</th>
        <th width="280px">Email</th>
        <th width="280px">Role</th>
        <th width="280px">Status</th>
        <th width="280px">Action</th> 
    </tr>
   </thead>
   <tbody>
    <tr>
    

    	@foreach($data as $k)
		      <td>{{ $k->id }}</td>
		      <td>{{ $k->name }}</td>
		      <td>{{ $k->lastname }}</td>
		      <td>{{ $k->email }}</td>
		      <td>{{ $k->roles['name'] }}</td>
              <td>
              @if($k->isOnline())
              <i class="fa fa-check"> online</i>
              @else
              <i class="fa fa-times"> offline</i>
              @endif
              </td>
              <td><a href="{{route('home.edit',$k->id)}}" class="fa fa-pencil mr-2"> </a>                   
            <a href="{{route('home.delete',$k->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');" class="fa fa-trash"></a></td>
                 
             
    </tr>
  </tbody>
  @endforeach
  </table>
  
{{$data->links()}}
  
   @if(Session::has('no-results'))
    <span style="display: flex; 
       justify-content: center">{{ Session::get('no-results') }}</span>
    @endif
      <!-- All search in one message as well as particular -->  
@endsection


