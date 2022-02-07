<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
    </style>
</head>
<body>
    <h1>All Images</h1>

    <div style="display: flex; justify-content:space-around;">
    <div>
    <form action="{{ route('add-image') }}" enctype="multipart/form-data" method="post">
        @csrf
            <p>
            Type some text (if you like):<br>
            <input type="text" name="textline" size="30">
            </p>
            <p>
            Please specify a file, or a set of files:<br>
            <input type="file" name="datafile" size="40">
            </p>
            <div>
            <input type="submit" value="Send">
            </div>
        </form>
        @if(session()->has('success'))
        <div style="color: green; margin-top:10px; font-weight:bold;">
        {{ session()->get('success') }}
        </div>
        @endif
    </div>   

    <div>
        @if(session()->has('info'))
        <div style="color: green; margin-top:10px; font-weight:bold;">
        {{ session()->get('info') }}
        </div>
        @endif
        <table id="customers">
            <tr>
              <th>Image</th>
              <th>Extension</th>
              <th>Action</th>
            </tr>
            @foreach ($media as $img)
            <tr>
                    <td>
                        {{-- {{ asset('image'.$img->image_path) }} --}}
                        <img src="{{ asset($img->image_path) }}" alt="">
                    </td>
                    <td>Maria Anders</td>
                    <td>
                        <form action="{{ route('delete-img',$img->id) }}" method="post">
                            @csrf
                            <input type="submit" value="Delete" style="padding:0.5rem 1rem; background-color:red; 
                            cursor: pointer; border-color:red; border-radius:5px; color:#fff;">
                        </form>    
                    </td>
                </tr>
                @endforeach
             
              </table>
    </div>

</div>


</body>
</html>