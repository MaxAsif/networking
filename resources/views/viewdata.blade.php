<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>


  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {


      $('#example').DataTable(
      {
       "columns": [
       { "searchable": false },
       { "searchable": false },
       null,
       null,
       null,
       null,
       { "searchable": false },
       { "searchable": false },
       null,
       { "searchable": false },null,
       ]
     });
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    } );
    function enabble(id)
    {
      document.getElementById(id).removeAttribute('disabled');
    }

    function copy_mail(element) {
      
     var $temp = $("<input>");
     $("body").append($temp);
     $temp.val($(element).text()).select();
     document.execCommand("copy");
     $temp.remove();
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
  <?php /*
    <div class="col-sm-3">

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      <a href="/viewdata"><span class="glyphicon glyphicon-pencil"></span> All</a>
      @for ($x = 1955; $x <= 2016; $x++) 
        <a href="/year/{{$x}}"><span class="glyphicon glyphicon-pencil"></span> {{$x}}</a>
        @endfor
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
*/?>


<div class="col-sm-9">
  @if($message!='')
  <div class="alert alert-success">
    <strong>Message :</strong>{{$message }}
  </div>
  <br>
  @endif
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
      <button type="button" class="btn btn-primary" id="copy_mail" onclick="copy_mail('.email')">COPY</button>
      <tr>
        <th> SELECT</th>
        <th>ID</th>
        <th>ALUMNI</th>
        <th>EMAIL </th>
        <th>INDUSTRY</th>
        <th>TAGS</th>

        <th>ADD TAG</th>
        <th>DELETE TAG</th>
        <th>Year</th>
        <th>Edit Data</th>
        <th>Profile</th>

      </tr>
    </thead>
    <tbody>

      @foreach($alumni as $alum)
      <tr>

        <form action="/assigntag" method="POST">
          {{csrf_field()}}
          <td> <input type="checkbox" name="alumid" value="{{$alum['id']}}" id="alumid" onclick="enabble({{$alum['id']}});"></td>
          <td>{{$alum['id']}}</td> 
          <td>{{$alum['name']}}</td>        
          <td class="email">{{$alum['email'].' '}}</td>
          <td>{{$alum['industry']}}</td>
          <td><?php
            $tags_a = App\Addtag::where('alum_id',$alum['id'])->pluck('tags');
            foreach ($tags_a as $tag_a)
            {
              echo $tag_a.'        ';  
            }
            ?>
          </td>

          <td><select name="tag" id="{{$alum['id']}}" disabled>
            @foreach($tags as $tag)
            <option value="{{$tag['tagname']}}">{{$tag['tagname']}}</option>
            @endforeach
          </select>
          <input type="submit" name="submit" value="Add">



        </td>
      </form>
      <td>
        <form action="/taggone" method="POST">
          {{csrf_field()}}
          <?php
          $tags_a = App\Addtag::where('alum_id',$alum['id'])->get();
          ?>
          <select name="tagd" id="{{$alum['id']}}" >
            @foreach($tags_a as $tag_a)
            <option value="{{$tag_a['id']}}">{{$tag_a['tags']}}</option>
            @endforeach
          </select>
          <input type="submit" name="submit" value="Delete">
        </form>
      </td>

      <td>{{$alum['year']}}</td>
      <td>
        <form action="/editalum" method="POST">
          {{csrf_field()}}
          <input type="submit" name="submit" value="{{$alum['id']}}">
        </form>


      </td>
      <td>
        <form action="/profile" method="POST">
          {{csrf_field()}}
          <input type="submit" name="submit" value="{{$alum['id']}}">
        </form>


      </td>
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