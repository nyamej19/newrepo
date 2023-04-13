@extends('layouts.userlayout')
@section('main')

<br>
<div class="container" style="margin-top: 10%;">
    <h4>This is an optional form you can fill to report about a worker's behavior or a good work done </h4>
    <form action="{{route('user-assesment-post',$workmanId)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <!-- <label for="exampleInputEmail1">Assesment</label> -->
            <textarea type="text" class="form-control" name="assesment" placeholder="Anything you would like to report about worker..."></textarea>

        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 2%;">Submit</button>
    </form>

</div>
