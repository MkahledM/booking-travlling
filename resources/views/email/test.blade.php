<html>
    <head>
        <title>test</title>
    </head>

    <body>

        @foreach($details['user'] as $item)
        <table style="border: 4px">
            <tr>
                <td>name:{{$item->name}}</td>
            </tr>
            <tr>

                <td>email:{{$item->email}}</td>
            </tr>
            <tr>

                <td>phone:{{$item->phone}}</td>

            </tr>
        </table>
        @endforeach
        @foreach($details['book'] as $item)
        <table style="border: 4px">
            <tr>
                <td>hotel: {{$item->name}}</td>
            </tr>
                <td>arive: {{$item->arive}}</td>
                <tr>                <td>leave:{{$item->leave}}</td>
                </tr>
                <tr>                <td>days:{{$item->days}}</td>
                </tr>
<tr>                <td>Total price:{{$item->total}}</td>
</tr>

        </table>

        @endforeach


    </body>
</html>
