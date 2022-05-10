
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4 img-container">
                        <img src=@yield('img') alt="" class="img-rounded img-responsive"/>
                    </div>
                    
                    <div class="col-sm-6 col-md-8">
                        <h4>@yield('name')</h4>

                        <small> 
                            <cite title="San Francisco, USA">
                                <i class="glyphicon glyphicon-user"></i> 
                                @yield('username')
                            </cite>
                        </small>

                        <p>
                            <i class="glyphicon glyphicon-pencil"></i>
                            @yield('bio')
                            <br />

                            <i class="glyphicon glyphicon-envelope"></i>
                            @yield('email')
                            <br />

                            <i class="glyphicon glyphicon-gift"></i>
                            @yield('birth')
                            <br/>
                            <a href="/file">change img</a>
                            <a href="/del-img">delete img</a>
                            <br/>
                            <a href="/del-acc">delete my account</a>
                        </p>

                         {{-- logout button --}}
                        <div class="btn-group">
                            <a href="{{url('logout')}}">
                                <button type="button" class="btn btn-danger">
                                    logout
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
