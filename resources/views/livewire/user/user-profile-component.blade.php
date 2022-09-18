<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Profile
                </div>
                <div class="panel-body">
                    <a href="{{route('user.profile_edit')}}" class="btn btn-info pull-right">Update Profile</a>

                    <div class="col-md-4">
                        @if($user->profile->image)
                            <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" width="100%" />
                        @else
                            <img src="{{asset('assets/images/profile/default.jpg')}}" width="100%" />
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><b>Name: </b>{{$user->name}}</p>
                        <p><b>Email: </b>{{$user->email}}</p>
                        <p><b>Phone: </b>{{$user->profile->mobile}}</p>
                        <hr>
                        <p><b>Line1: </b>{{$user->profile->line1}}</p>
                        <p><b>Line2: </b>{{$user->profile->line2}}</p>
                        <p><b>City: </b>{{$user->profile->city}}</p>
                        <p><b>Province: </b>{{$user->profile->province}}</p>
                        <p><b>Country: </b>{{$user->profile->country}}</p>
                        <p><b>Zip Code: </b>{{$user->profile->zipcode}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

