@extends('layouts.adminlayout')
@section('main')



<style>
  input[type=text],
  select,
  textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }

  input[type=submit] {
    background-color: #046daa;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #11c4db;
  }

  .container1 {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    margin: 30px;
    margin-top: 10%;
  }

  @media screen and (max-width: 600px) {
    .container1 {
      width: 80%;
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      margin: 0;
      margin-right: 0;
      margin-top: 30%;
    }

    input[type=text],
    select,
    textarea {
      width: 90%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=submit] {
      background-color: #046daa;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #11c4db;
    }

  }
</style>

<div class="container1">
  <h4>Edit Home</h4>

  <!--




         -->
  <form action="{{route('edit-home',$home->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{method_field('PUT')}}

    <label for="fname">Price</label>
    <input type="text" name="price" placeholder="price..." value="{{$home->price}}" id="name" required>
    <br>
    <label for="lname">Availability</label>
    <select name="availability" id="saleType" required>
      <option value="" hidden>Choose Option</option>
      <option value="{{old('Yes', $home->availability)}}">Yes</option>
      <option value="{{old('No', $home->availability)}}">No</option>
    </select>
    <br>
    <br>
    <label for="fname">Building Image</label>
    <input type="file" name="homeImg" placeholder="price..." value="{{$home->homeImg}}" id="name" accept="image/*" required>
    <br>
    <br>
    <label for="fname">Home Video Link</label>
    <input type="text" name="homevid" placeholder="link of video from youtube..." value="{{$home->homevid}}" id="name" required>
    <br>
    <br>
    <label for="lname">Location</label>
    <input type="text" name="location" placeholder="home location..." id="name" value="{{$home->location}}" required>

    <label for="lname">Detail Description</label>
    <textarea type="text" name="detailDesc" placeholder="Home Descritpion..." id="desc" required>
    {{$home->detailDesc}}
    </textarea>

    <label for="lname">Summary Description</label>
    <textarea type="text" name="summDesc" placeholder="Home Descritpion..." id="desc" required>
    {{$home->summDesc}}
    </textarea>


    <label for="lname"> Building Type</label>
    <select name="homeType" id="homeType" required>
      <option value="" hidden>Choose Option</option>
      <option value="{{old('Bungalow', $home->homeType)}}">Bungalow</option>
      <option value="{{old('Cottage', $home->homeType)}}">Cottage</option>
      <option value="{{old('Ranch', $home->homeType)}}">Ranch</option>
      <option value="{{old('Duplex', $home->homeType)}}">Duplex</option>
      <option value="{{old('two-family-duplex', $home->homeType)}}">Two-family Duplex</option>
    </select>

    <label for="lname">Sale Type</label>
    <select name="saleType" id="saleType" required>
      <option value="" hidden>Choose Option</option>
      <option value="{{old('rent', $home->saleType)}}">For Rent</option>
      <option value="{{old('sale', $home->saleType)}}">For Sale</option>
    </select>


    <br>
    <br>

    <button type="submit" value="Edit Home" class="btn btn-primary" id="add-service">Edit Home</button>
  </form>
</div>
