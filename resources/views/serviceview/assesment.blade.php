@extends('layouts.servicelayout')
@section('main')

<br>
<div class="container" style="margin-top: 10%;">
    <h4>This is an optional form you can fill to report about a solicitant's's behavior or any related</h4>
    <form action="{{route('worker-assesment-post',$userId)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <!-- <label for="exampleInputEmail1">Assesment</label> -->
            <textarea type="text" class="form-control" name="assesment" placeholder="Anything you would like to report about solicitant..." required></textarea>

        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 2%;">Submit</button>
    </form>

</div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script type="text/javascript">
    swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        button: "Aww yiss!",
    });
</script> -->
