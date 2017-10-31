<head>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>


  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




  <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>
  <script type="text/javascript" src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#example').DataTable();
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    } );
    function enabble(id)
    {
      document.getElementById(id).removeAttribute('disabled');
    }
  </script>
</head>
<body>
  @include('layouts.navbar')

  <style>
    body {
      font-family: "Lato", sans-serif;
      background-color: #f5f8fa;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;

    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
    .col.sm.4
    {
      background-color: white;
    }
  </style>








  <div class="col-sm-3">

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#"><span class="glyphicon glyphicon-pencil"></span> About</a>
      <a href="#"><span class="glyphicon glyphicon-envelope"></span> Services</a>
      <a href="#"><span class="glyphicon glyphicon-user"></span> Clients</a>
      <a href="#"><span class="glyphicon glyphicon-print"></span> Contact</a>
    </div>
  </div>


  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }

  </script>

  <div class="col-sm-9">
    @if($message!='')
    <div class="alert alert-success">
      <strong>Message :</strong>{{$message }}
    </div>
    <br>
    @endif
    <table id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th> SELECT</th>
          <th>ALUMNI</th>
          <th>EMAIL</th>
          <th>INDUSTRY</th>
          <th>TAGS</th>
          <th>ADD TAG</th>

        </tr>
      </thead>
      <tbody>

        @foreach($alumni as $alum)
        <tr>

          <form action="/assigntag" method="POST">
            {{csrf_field()}}
            <td> <input type="checkbox" name="alumid" value="{{$alum['id']}}" id="alumid" onclick="enabble({{$alum['id']}});"></td>
            <td>{{$alum['name']}}</td>        
            <td>{{$alum['email']}}</td>
            <td>{{$alum['industry']}}</td>
            <td><select name="tag" id="{{$alum['id']}}" disabled>
              @foreach($tags as $tag)
              <option value="{{$tag['tagname']}}">{{$tag['tagname']}}</option>
              @endforeach
            </select>
          </td>

          <!--<td><input type="text" name="tag" id="{{$alum['id']}}" readonly></td>-->
          <td><input type="submit" name="submit" value="Add"></td>
        </form>
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