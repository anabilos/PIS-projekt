@extends('layouts.app1',['name' => Auth::user()->name])


@section('content')



    <div class="row">
      <h1 class="display-4 pb-4"><b>Članovi</b></h1>
    </div>

    @if(Session::get('success'))
    <div class="row ">
    <div class=" alert alert-success col-sm-10  mt-3 ">
        {{Session::get('success')}}
        
        @php
            Session::forget('success')
        @endphp
    </div>
    </div>
    @endif
        <div class="row">
            <div class="col-sm-4"><a href="{{ route('child.create') }}"  class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="fa fa-plus pr-2"></i>Dodaj novog člana</a></div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            @foreach($children as $child)
            <div class="col-lg-4 ">
                <div class="text-center card-box ">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img src="novo/img/user_icon.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <div >
                            <h4>{{$child->firstName}} {{$child->lastName}}</h4>
                            <p class="text-muted">Godine <span>: {{$child->age}} </span></p>
                        
                        
                        <a href="{{ route('child.edit', $child->id) }}"  class=" btn btn-custom mt-3 mr-2 btn-rounded waves-effect w-md waves-light">Uredi profil</a>
                        <form action="{{ route('child.destroy' , $child->id)}}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                             <button type="submit" class="btn btn-custom mt-3">
                              <i class="fa fa-times "></i>
                             </button>
                               </form>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
      
        </div>
       

@endsection