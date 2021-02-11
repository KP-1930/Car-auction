@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))

        <div class="alert alert-success" style="text-align:center;">

            <p>{{ $message }}</p>

        </div>

   @endif
<h2 style="text-align:center;"> Edit User</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pt-4">
                <form method="POST" action="{{ route('home.update',$user->id) }}">
                {{@csrf_field()}}
                             <input type="hidden" name="_method" value="PUT">


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}"  autocomplete="name" autofocus>
                                @if($errors->has('name'))<p style="color:red;">{{$errors->first('name')}} @endif <br>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{$user->lastname}}"  autocomplete="lastname" autofocus>
                                @if($errors->has('lastname'))<p style="color:red;">{{$errors->first('lastname')}} @endif <br>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}"  >
                                @if($errors->has('email'))<p style="color:red;">{{$errors->first('email')}} @endif <br>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="select-role" class="col-md-4 col-form-label text-md-right">{{ __('Select Role') }}</label>

                            <div class="col-md-6">
                            <select name="role_id" id="role_id" class="form-control">
                           
                            <option selected value="" selected>Please Select</option>
                            @foreach( App\Role::getRolesListBackend() as $key=> $value)
                            <option <?= ($key == $user->role_id) ? "selected" : " " ?>  value="{{$key}}">{{$value}}</option>
                            @endforeach
                            </select> 
                            @if($errors->has('role_id'))<p style="color:red;">{{$errors->first('role_id')}} @endif <br>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-2">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection