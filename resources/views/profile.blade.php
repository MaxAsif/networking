@extends('layouts.app')

@section('content')
<div class="container">
  @foreach($alumni as $alum)    
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$alum['name']}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="1.jpg" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Address</td>
                        <td>{{$alum['address']}}</td>
                      </tr>
                      <tr>
                        <td>CITY</td>
                        <td>{{$alum['city']}}</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>{{$alum['dob']}}</td>
                      </tr>
                      <tr>
                        <td>Country</td>
                        <td>{{$alum['country']}}</td>
                      </tr>
                      <tr>
                        <td>Mobile</td>
                        <td>{{$alum['mobile']}}</td>
                      </tr>
                      <tr>
                        <td>Year of Graduation</td>
                        <td>{{$alum['year']}}</td>
                      </tr>
                   
                         <tr>
                           
                      <tr>
                        <td>Email</td>
                        <td>{{$alum['email']}}</td>
                      </tr>
                        <td>Phone Number</td>
                        <td>{{$alum['mobile']}}
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                       
                    </div>
            
          </div>
        </div>
      </div>
      @endforeach
    </div>
@endsection
