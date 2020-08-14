@extends('layout.admin')

@section('title',' ADD ROLE')
@section('bar_form')
<a href="{{route('admin.Role.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()

@section('main')


<div class="panel panel-default" ng-app="role" ng-controller="roleController">

        <div class="panel-body">
            
            <form action="{{route('admin.Role.store')}}" method="POST" role="form">
                @csrf
            
                <div class="form-group">
                    <label for="">Routes list name</label>
                    <input type="text" class="form-control" name="name" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Search</label>
                    <input type="text" class="form-control" ng-model="search">
                </div>
                

                <div class="form-group" style="height: 300px; overflow-y: auto">
                    <label for="">Routes</label>
                   <div class="checkbox" ng-repeat="r in roles|filter:search">
                       <label>
                           <input type="checkbox" class="role-item" name="route[]" value="@{{r}}">
                           @{{r}}
                       </label>
                   </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <label>
                     <input type="checkbox" id="check-all">
                    Select All
                </label>
            </form>
            
        </div>


</div>
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.0/angular.min.js"></script>
<script>
    var app = angular.module('role',[]);
    app.controller('roleController',function($scope){
        var role = <?php echo json_encode($routes) ?>;
        $scope.roles = role;
        console.log(role);
    });

    $('#check-all').click(function(){
        $('.role-item').not(this).prop('checked', this.checked);
    });
</script>
@stop