@extends('layouts.adminlayout')
@section('main')

<style>
    input[type=text],
    select,
    input[type=number],
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
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 30px;
            margin-top: 30%;
        }
    }
</style>

<div class="container1">
    <h4>Add Service</h4>
    <form action="{{route('add-service')}}" method="post">
        {{ csrf_field() }}
        <label for="fname">Name</label>
        <input type="text" name="name" placeholder="name..." id="name" required>

        <label for="fname">Serivce Charge</label>
        <input type="number" name="servicecharge" placeholder="charge..." id="name" required>

        <label for="lname">Description</label>
        <textarea type="text" name="description" placeholder="Service Description..." id="desc" required></textarea>
        <br>
        <br>

        <input type="submit" value="Add Service" class="btn btn-primary-outline" id="add-service">
    </form>
</div>
