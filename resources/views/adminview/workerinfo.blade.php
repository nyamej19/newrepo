@extends('layouts.adminlayout')
@section('main')


<style>
    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table tr {
        background-color: #137766;
        border: 1px solid #e1e5e9;
        padding: .35em;
        border-radius: 3px;
    }

    table thead tr:first-child {
        border: 1px solid #0dd83f;
    }

    table th,
    table td {
        padding: 1.625em;
        text-align: center;
        color: #137766;
        font-size: 14px;
        /* font-family: cursive; */
    }

    table td:nth-child(4) {
        font-size: 18px;
    }

    table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
        background: #137766;
        color: #FFF;
    }

    table tbody tr td .btn-invoice {
        background: #02691d;
        color: #FFF;
        font-size: 13px;
        padding: 10px 20px;
        border: 0;
        /* font-family: cursive; */
    }

    tbody tr:nth-child(even) {
        background-color: #eee;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    @media screen and (max-width: 600px) {
        table {
            border: 0;
            width: 100%;

        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            position: absolute;
            width: 1px;
            padding: 0;
        }

        table tr {
            border-bottom: 3px solid #e1e5e9;
            display: block;
            margin-bottom: .625em;
        }

        table th,
        table td {
            padding: 0.625em;
        }

        table td {
            border-bottom: 1px solid #e1e5e9;
            display: block;
            font-size: .8em;
            text-align: right;
            color: #9da9b9;
        }

        table td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
            color: #656971;
        }

        table td:last-child {
            border-bottom: 0;
        }

        table td:nth-child(4) {
            font-size: 0.8em;
        }
    }
</style>

<div class="container" style="margin-top: 10%;width:100%">
    <h4 style="margin-left: 30%; text-decoration:underlined;">Worker Assesment Information</h4>
    <table>
        <thead>
            <tr>
            <th><label>Profile Image</label></th>
                <th><label>Full Name</label></th>
                <th><label>Email</label></th>
                <th><label>Phone</label></th>
                <!-- <th><label>Message</label></th> -->



            </tr>
        </thead>
        <tbody>

            <tr>
            <td data-label="Profile Image" id="region"><img src="{{ asset('/app/public/'.$workerinfo->image) }}" class="img-fluid" alt="" style="width:60px;height:40px;"></td>
                <td data-label="Name" id="firstname">{{$workerinfo->name}}</td>
                <td data-label="Email" id="lastname">{{$workerinfo->email}}</td>
                <td data-label="Phone" id="phone">{{$workerinfo->phone}}</td>



            </tr>

        </tbody>
    </table>
</div>
