<head>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>
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
             <br><input type="radio" name="{{$tag['id']}}" value="0" id="tagid_{{$tag['id']}}" checked="">NO
             <br><br>
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