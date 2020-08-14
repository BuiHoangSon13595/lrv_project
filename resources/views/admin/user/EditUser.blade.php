@extends('layout.admin')
@section('title','Edit user')
@section('bar_form')
<a href="{{route('admin.User.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

    
    <div class="panel panel-default">
          <div class="panel-body">
               
               <form action="{{route('admin.User.update', $user->id)}}" method="POST" role="form">
                @csrf @method('PUT')
                <input type="hidden" class="form-control"name="id" value="{{$user->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            @error('name')                             
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>{{$message}}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            @error('email')                             
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>{{$message}}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                            @error('phone')                             
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>{{$message}}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" >
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" >
                            @error('confirm_password')                             
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>{{$message}}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Roles</label>
                            @foreach($roles as $role)
                            <?php $checked = in_array($role->name, $roles_assigned) ? 'checked' : ''; ?>
                            <div class="checkbox">
                            <label>
                                <input type="checkbox" {{$checked}} name="role[]" value="{{$role->id}}">
                                {{$role->name}}
                            </label>
                            @endforeach
                        </div>    
                        </div>         
                        
                    </div>
                    
                </div>
               
                   <button type="submit" class="btn btn-primary">Submit</button>
               </form>
               
          </div>
    </div>
    
@stop