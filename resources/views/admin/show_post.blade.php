<!DOCTYPE html>
<html>
<head>

    @include('admin.css')

    <style type="text/css">

        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color:white;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }

        .table_deg
        {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 100px;
        }

        .th_deg
        {
            color: white;
            background-color: #0c5460;
        }

        .img_deg
        {
            height: 100px;
            width: 150px;
            padding: 10px;
        }

    </style>

</head>
<body>

@include('admin.header')

<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->

    @include('admin.sidebar')

    <div class="page-content">

        {{--        this message session doesnt work.       --}}

        @if(session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-bs-dismiss="alert" aria-hideen="true"> x </button>

                {{session()->get('message')}}

            </div>

        @endif
        {{--        end of message status.       --}}

        <h1 class="title_deg"> All Posts </h1>

        <table class="table_deg">

            <tr class="th_deg">

                <th> Post Title </th>

                <th> Description </th>

                <th> Post by </th>

                <th> Post Status </th>

                <th> Image </th>

            </tr>

  @foreach($post as $post)
            <tr>
                <td> {{$post -> title }} </td>

                <td> {{$post -> description }} </td>

                <td> {{$post -> name }} </td>

                <td> {{$post -> post_status }} </td>

                <td> {{$post -> usertype }} </td>

                <td>

                    <img class="img_deg" src="postimage/{{$post -> image}}">

                </td>
            </tr>

  @endforeach

        </table>




@include ('admin.footer')
</body>
</html>
