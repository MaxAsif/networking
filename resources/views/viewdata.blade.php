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
      $('#example').DataTable();
    } );
  </script>
</head>
<body>
  @include('layouts.navbar')
  <div class="container">

    <table id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ALUMNI</th>
          <th>EMAIL</th>
          <th>INDUSTRY</th>


        </tr>
      </thead>
      <tbody>

        @foreach($alumni as $alum)
        <tr>
          <td>{{$alum['name']}}</td>        
          <td>{{$alum['email']}}</td>
          <td>{{$alum['industry']}}</td>

        </tr>
        @endforeach

      </tbody>
    </table>

  </div>

  <script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#example')
  .removeClass( 'display' )
  .addClass('table table-striped table-bordered');
</script>
</body>
</html>