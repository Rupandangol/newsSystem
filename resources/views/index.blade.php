@include('header.header')
<div class="container">
    <div style="background-image:{{url("../Uploads/1.jpg")}}" class="jumbotron">
        <p>asdfasdf</p>
        <h1 style="text-align: center;" class="display-4">Hello, world!</h1>

    </div>
</div>
<div class="container" style="background-image:{{url('../Uploads/1.jpg')}}">
<form style="margin-left: 500px;" action='{{route('addData')}}' method="post">


    <input type="text" name="data"><br>
    <button class="btn btn-primary" type="submit">Add</button>

</form>
</div>
@include('footer.footer')