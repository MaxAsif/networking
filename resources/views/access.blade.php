<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#smtable').DataTable();
    } );
  </script>
</head>
<body>




 @include('layouts.navbar')

 <div class="container">
  <h2>STUDENT MEMBERS DETAILS</h2>    
  <table id="smtable" class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>



      </tr>
    </thead>
    <tbody>

      @foreach($smembers as $member)
      <tr>
        <td>{{$member['id']}}</td>     
        <td>{{$member['name']}}</td>        
        <td>{{$member['email']}}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="container" >
  <form method="post" action="/access">
            {{csrf_field()}}

    <select name="tag" >
              @foreach($smembers as $tag)
              <option value="{{$tag['name']}}">{{$tag['name']}}</option>
              @endforeach
            </select>
            <br>

           

            @foreach($tags as $tag)
            {{$tag['tagname']}}<br>
             <input type="radio" name="{{$tag['id']}}" value="{{$tag['id']}}" id="tagid_{{$tag['id']}}">YES
             <input type="radio" name="{{$tag['id']}}" value="0" id="tagid_{{$tag['id']}}" checked="">NO
             <br>
              @endforeach

              <input type="submit" value="Submit">
    
      </form>





</div>



<script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#smtable')
  .removeClass( 'display' )
  .addClass('table table-striped table-bordered');
</script>


</body>
</html>           