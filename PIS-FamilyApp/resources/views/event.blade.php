

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        
        {!! Html::style('vendor/seguce92/fullcalendar/fullcalendar.min.css') !!}
        {!! Html::style('vendor/seguce92/bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
        {!! Html::style('vendor/seguce92/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('novo/style.css') }}" type="text/css">
        {!! Html::style('vendor/seguce92/bootstrap/css/bootstrap.min.css') !!}
      
        
            
    </head>
    <body style="font-size:15.4px">
       
        <div class="vertical-nav bg-white " style="width: 270px" id="sidebar">
            <div class="py-4 px-3 mb-4 bg-light">
              <div class="media d-flex align-items-center">
                <img loading="lazy" src="{{ URL::asset("/novo/img/icon.jpg") }}"alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body ">
                  <h4><b>Obitelj Biloš</b></h4>
                  
                </div>
              </div>
            </div>
          
            <p class="text-gray font-weight-bold text-uppercase px-3 small p-4 mb-0 ">Dashboard</p>
          
            <ul class="nav flex-column bg-white mb-0">
            
              <li class="nav-item">
                <a href="{{ route('child.index') }}" class="nav-link text-dark">
                          <i class="fa fa-address-card mr-3 text-blue  fa-fw"></i>
                          Članovi
                      </a>
              </li>
              
                <li class="dropdown nav-item">
                  <a class="dropdown-toggle nav-link text-dark"
                     data-toggle="dropdown"
                     href="#">
                     <i class="fa fa-tasks mr-3 text-blue  fa-fw"></i>
                     Zadaci
                 </a>
                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                  <li><a tabindex="-1" class=" nav-link text-dark" href="{{ route('task.index', ['type' => 'nonperiodic']) }}" >Neperiodični</a></li>
                  <li><a tabindex="-1" class=" nav-link text-dark "href="{{ route('task.index', ['type' => 'periodic']) }}" >Periodični</a></li>
                </ul>
                </li>
              
           
              <li class="nav-item">
                <a href="{{ route('event.index') }}"class="nav-link text-dark">
                          <i class="fa fa-calendar-o mr-3 text-blue  fa-fw"></i>
                          Kalendar
                      </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('item.index') }}" class="nav-link text-dark">
                            <i class="fa fa-shopping-cart mr-3 text-blue  fa-fw"></i>
                            Namirnice
                        </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('menu') }}" class="nav-link text-dark">
                            <i class="fa fa fa-arrow-left mr-3 text-blue  fa-fw"></i>
                            Natrag na početnu
                        </a>
                </li>
              
              <li class="nav-item">
                  
                
                  <a class=" nav-link text-dark" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                               <i class="fa fa-sign-out mr-3 text-blue  fa-fw"></i>   
                          Odjavite se
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                     
                </li>
               
          
            
          
          
             
            </ul>
          
          
          </div>
          
          <div class="page-content pt-5 " id="content">
            
          
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-8">
            {{ Form::open(['route' => 'events.store', 'method' => 'post', 'role' => 'form']) }}
            <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Kreiraj novi događaj</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('title', 'Naziv') }}
                                {{ Form::text('title', old('title'), ['class' => 'form-control']) }}
                                
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_start', 'Datum početka') }}
                                {{ Form::text('date_start', old('date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('time_start', 'Vrijeme početka') }}
                                {{ Form::text('time_start', old('time_start'), ['class' => 'form-control']) }}
                            </div>

                           

                            <div class="form-group">
                                {{ Form::label('color', 'Odabir boje') }}
                                <div class="input-group colorpicker">
                                    {{ Form::text('color', old('color'), ['class' => 'form-control']) }}
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dafault" data-dismiss="modal">Odustani</button>
                            {!! Form::submit('SPREMI', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
            <div id='calendar'></div>

            <div id="modal-event" class="modal fade" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Detalji događaja</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('_title', 'Naziv') }}
                                {{ Form::text('_title', old('_title'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_date_start', 'Datum događaja') }}
                                {{ Form::text('_date_start', old('_date_start'), ['class' => 'form-control', 'readonly']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_time_start', 'Vrijeme događaja') }}
                                {{ Form::text('_time_start', old('_time_start'), ['class' => 'form-control']) }}
                            </div>

                           

                            <div class="form-group">
                                {{ Form::label('_color', 'Boja') }}
                                <div class="input-group colorpicker">
                                    {{ Form::text('_color', old('_color'), ['class' => 'form-control']) }}
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a id="delete" data-href="{{ url('events') }}" data-id="" class="btn btn-danger">Izbriši</a>
                            <button type="button" class="btn btn-dafault" data-dismiss="modal">Odustani</button>
                            <a href="#" data-href="{{ url('events') }}" class="btn btn-success btn-update" data-id="">Uredi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        
    </body>
    {!! Html::script('vendor/seguce92/jquery.min.js') !!}
    {!! Html::script('vendor/seguce92/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('vendor/seguce92/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('vendor/seguce92/fullcalendar/fullcalendar.min.js') !!}
    {!! Html::script('vendor/seguce92/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
    {!! Html::script('vendor/seguce92/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('novo/main.js') !!}
    <script>
        var BASEURL = "{{ url('/') }}";
        $(document).ready(function() {
    		$('#calendar').fullCalendar({
    			header: {
    				left: 'prev,next today',
    				center: 'title',
    				right: 'month,basicWeek,basicDay'
    			},
    			navLinks: true, // can click day/week names to navigate views
    			editable: true,
                selectable: true,
                selectHelper: true,
                select: function(start){
                    start = moment(start.format());
                    $('#date_start').val(start.format('YYYY-MM-DD'));
                    $('#responsive-modal').modal('show');
                },
    			events: BASEURL + '/events',
                eventClick: function(event, jsEvent, view){
                    var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                    var time_start = $.fullCalendar.moment(event.start).format('hh:mm:ss');
                
                    $('#modal-event #delete').attr('data-id', event.id);
                    $('#modal-event .btn-update').attr('data-id', event.id);
                    $('#modal-event #_title').val(event.title);
                    $('#modal-event #_date_start').val(date_start);
                    $('#modal-event #_time_start').val(time_start);
                  
                    $('#modal-event #_color').val(event.color);
                    $('#modal-event').modal('show');
                }
    		});
    	});
        $('.colorpicker').colorpicker();
        $('#time_start').bootstrapMaterialDatePicker({
            date: false,
            shortTime: false,
            format: 'HH:mm:ss'
        });
      
        $('#_time_start').bootstrapMaterialDatePicker({
            date: false,
            shortTime: false,
            format: 'HH:mm:ss'
        });
       
        $('#delete').on('click', function(){
            var x = $(this);
            var delete_url = x.attr('data-href')+'/'+x.attr('data-id');
            $.ajax({
                url: delete_url,
                type: 'DELETE',
                success: function(result){
                    $('#modal-event').modal('hide');
                    alert(result.message);
                    location.reload(true);
                },
                error: function(result){
                    $('#modal-event').modal('hide');
                    alert(result.message);
                }
            });
        });
        $(document).on('click', '.btn-update', function () {
            
            var route_update = $(this).attr('data-href') + '/' + $(this).attr('data-id'); 
            var data = {
                'date_start': $('#_date_start').val(),
                'title':$('#_title').val(),
                'time_start': $('#_time_start').val(),
                
                'color': $('#_color').val(),
                '_method': 'PATCH'
            };
            $.ajax({
                data: data,
                type: 'PATCH',
                url: route_update,
                success: function(result) {
                    $('#modal-event').modal('hide');
                    if(result.status === 201){
                        alert(result.message);
                        location.reload(true);
                    }
                    else
                        alert(result.message);
                },
                error: function() {
                    $('#modal-event').modal('hide');
                    alert('Greška prilikom ažuriranja događaja');
                }
            });
        });
    </script>
</html>