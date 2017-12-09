<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

</head>
<script type="text/javascript" charset="utf-8">
  /*$(document).ready(function() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  } );
  */
  $(document).ready(function(){
    $('#myTable1').dataTable();
    $('#myTable2').dataTable();
    $('#myTable3').dataTable();
    $('#myTable4').dataTable();
  });
/*
$('#example').DataTable(
      {
        "columns": [
        null,
        null,
        null,
        null,
        null,
        { "searchable": false }
        ]
      });
      */

      function copy_mail(element) {

       var $temp = $("<input>");
       $("body").append($temp);
       $temp.val($(element).text()).select();
       document.execCommand("copy");
       $temp.remove();
       alert("Emails have been succesfully copied!");
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
    
    
  </style>








<!--
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
-->
<div class="container">
  
    @if (session('message'))
    <div class="alert alert-success">
      <strong>Message : {{ session('message') }}</strong>
    </div>
    @endif
  <div class="row">
    <div class="col-sm-9">

      <ul class="nav nav-tabs">

        @php
        $i=0;
        foreach($tags_list as $tags)
        {
          $name = "";
          foreach ($tags as $tag) {
            $name = $name.' '.$tag;
          }
          $i++;
          if($i == 1)
           echo '<li class="active"><a data-toggle="tab" href="#'.$i.'">'.$name.'</a></li>';
         else
          echo '<li><a data-toggle="tab" href="#'.$i.'">'.$name.'</a></li>';
      }
      $i=0;
      @endphp

    </ul>
  </div>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <div class="tab-content">

       @foreach($tags_list as $tags)
       @php
       $name = "";
       foreach ($tags as $tag) {
        $name = $name.' '.$tag;
      }
      if($i==0)
        echo '<div id="'.++$i.'" class="tab-pane fade in active">';
      else
       echo '<div id="'.++$i.'" class="tab-pane fade">';
     @endphp
     <table id="myTable{{$i}}"  class="table table-striped table-bordered results" cellspacing="0" width="100%">
      <button type="button" class="btn btn-primary" id="copy_mail" onclick="copy_mail('.email')">COPY</button>
      
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>INDUSTRY</th>
          <th>YEAR</th>
          <th>TAGS</th>
          <th>ADD TAG</th>
          <th>DELETE TAG</th>
          <th>EDIT</th>


        </tr>
      </thead>
      <tbody class="searchable">
        @php
        $alumni_id = [];
        foreach($tags as $tag)
        {
          if(is_numeric($tag))
          {
            array_push($alumni_id,(App\Alumni::where('year',$tag)->pluck('id')->toArray()));
          }
          else
          {
          array_push($alumni_id,(App\Addtag::where('tags',$tag)->pluck('alum_id')->toArray()));
          }
        } 
        if(count($alumni_id)>1)
        {
          $alum_intersect = call_user_func_array('array_intersect',$alumni_id);
        }
        else
        {
          $alum_intersect = $alumni_id[0];
        }
        foreach($alum_intersect as $id)
        {
          $alum = App\Alumni::find($id);
          
          echo '<tr><td>'.$alum['id'].'</td>';
          echo '<td><a href="/profile/'.$alum['id'].'">'.$alum->name.'</a></td>';
          echo '<td class="email">'.$alum->email.'  '.'</td>';
          echo '<td>'.$alum->industry.'</td>';
          echo '<td>'.$alum->year.'</td>';
          echo '<td>';
          $tags_a = App\Addtag::where('alum_id',$alum['id'])->pluck('tags');
          foreach ($tags_a as $tag_a)
          {
            echo $tag_a.'        ';  
          }

          echo '</td>';

          ;
          $tags = App\Tagslist::get();
          echo '<td><form action="/assigntag/'.$alum['id'].'" method="post">'.csrf_field().'<select name="tag" id='.$alum['id'];

          foreach($tags as $tag)
          {
            echo '<option value='.$tag['tagname'].'>'.$tag['tagname'].'</option>';
          }
          echo '</select>
          <input type="submit" name="submit" value="Add"></form></td>';


          $tags_a = App\Addtag::where('alum_id',$alum['id'])->get();

          echo '<td>
          <form action="/taggdelete/'.$alum['id'].'" method="post">'.csrf_field().'<select name="tagd" >';
            foreach($tags_a as $tag_a)
            {
             echo '<option value='.$tag_a['id'].'>'.$tag_a['tags'].'</option>';
           }
           echo '</select><input type="submit" name="submit" value="Delete"></form></td>';

           echo '<td><form action="/editalum" method="POST">
           '.csrf_field().'
           <input type="submit" name="submit" value='.$alum['id'].'>
         </form></td>
       </tr>';


     }
     @endphp

   </tbody>
 </table>
</div>

@endforeach
</div>

</div>
</div>
</div>


</body>
</html>