<!DOCTYPE html>
<html>
<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

                <button type="button" class="close" data-dismiss="alert" aria-hideen="true"> x </button>

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

                <th> Delete </th>

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

                <td>
                    <a href="{{url('delete_post', $post->id)}}"
                       class="btn btn-danger"

                        {{--  Sweet Delete Function --}}
                       onclick="confirmation(event)">
                        Delete </a>
                </td>
            </tr>

  @endforeach

        </table>

    </div>
</div>


@include ('admin.footer')

                    {{--SWEET DELETE FUNCTION--}}
    <script type="text/javascript">
        function confirmation (ev)
        {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href')

            console.log(urlToRedirect);

            swal({

                title:"Are you sure to delete this ? ",

                text: "You won't be able to revert this delete",

                icon: "warning",

                buttons: true,

                dangerMode: true,
            })

                .then((willCancel)=>
            {
                if(willCancel)
                {
                    window.location.href = urlToRedirect
                }
            });
        }

    </script>

</body>
</html>
