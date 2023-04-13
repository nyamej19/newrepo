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
    <h4>Add Home</h4>

    <!--




         -->
    <form action="{{route('add-home')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <label for="fname">Price</label>
        <input type="text" name="price" placeholder="price..." id="name" required>
        <br>
        <label for="fname">Building Image</label>
        <input type="file" name="homeImg" placeholder="price..." id="name" accept="image/*" required>
        <br>
        <br>
        <label for="fname">Home Video Link</label>
        <input type="text" name="homevid" placeholder="type in home video link from youtube..." id="name" required>
        <br>
        <br>
        <label for="lname">Location</label>
        <input type="text" name="location" placeholder="home location..." id="name" required>

        <label for="lname">Detail Description</label>
        <textarea type="text" name="detailDesc" placeholder="Home Descritpion..." id="desc" required></textarea>

        <label for="lname">Summary Description</label>
        <textarea type="text" name="summDesc" placeholder="Home Descritpion..." id="desc" required></textarea>


        <label for="lname"> Building Type</label>
        <select name="homeType" id="homeType" required>
            <option value="" hidden>Choose Option</option>
            <option value="bungalow">Bungalow</option>
            <option value="cottage">Cottage</option>
            <option value="ranch">Ranch</option>
            <option value="duplex">Duplex</option>
            <option value="two-family-duplex">Two-family Duplex</option>
        </select>

        <label for="lname">Sale Type</label>
        <select name="saleType" id="saleType" required>
            <option value="" hidden>Choose Option</option>
            <option value="rent">For Rent</option>
            <option value="sale">For Sale</option>
        </select>


        <br>
        <br>

        <input type="submit" value="Add Home" class="btn btn-primary-outline" id="add-service">
    </form>
</div>
