@extends('layouts.publiclayout')
@section('main')

<div style="margin-top:12%;width: 70%;margin-left:10%;">
    <h3>Service Request Selected: {{$service->Name}}</h3>
    <form action="{{route('req-service-form' ,[$service->id,$serviceperson->id])}}" method="post" style="margin-top: 10%;">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Service Selected</label>
            <input type="text" value="{{$service->Name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Problem Statement</label>
            <textarea id="message" name="statement" placeholder="state problem here..." required maxlength="120" class="form-control" style="height:200px"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputPassword1">Time You Want Service</label>
            <input type="datetime-local" class="form-control" name="time_of_service" required>
        </div>
        <br>
        <div class="form-group">
            <label for="lname">Charge Per hour</label>
            <input type="text" class="form-control" name="chargeperhour" value="{{$service->service_charge}}" required readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="number" class="form-control" name="phone" required>
        </div>
        <br>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">Agree to the terms and services</label>
        </div>
        <button type="submit" class="btn btn-primary">Request Service</button>
    </form>
</div>
