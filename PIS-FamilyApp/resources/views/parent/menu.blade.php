@extends('layouts.app')

@section('content')


<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Main Menu</h3>
        </div>

        <ul class="list-unstyled components">
            
            <li >
                <a href="{{ route('child.index') }}" >Članovi</a>
               
            </li>
            <li>
                <a href="{{ route('task.index') }}">Zadaci</a>
            </li>
            <li>
                <a href="#" >Kalendar</a>
                
            </li>
            <li>
                <a href="{{ route('item.index') }}">Namirnice</a>
            </li>
            
        </ul>
      
    
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
    $(document).ready(function () {

        $("#sidebar").mCustomScrollbar({
             theme: "minimal"
        });
    
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    
    });
    </script>
    <script>
     $(document).ready(function () {

$("#sidebar").mCustomScrollbar({
     theme: "minimal"
});

$('#sidebarCollapse').on('click', function () {
    // open or close navbar
    $('#sidebar').toggleClass('active');
    // close dropdowns
    $('.collapse.in').toggleClass('in');
    // and also adjust aria-expanded attributes we use for the open/closed arrows
    // in our CSS
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
});

});
        </script>

        

</div>


    
@endsection