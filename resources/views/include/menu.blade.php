<nav class="navbar navbar-expand bg-light">
	<ul class="navbar-nav ml-auto">
		@if (Route::has('login'))
		@auth
			@if ($level == 1)
			<li class="nav-item"><a  href="{{ url('/') }}" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="{{ url('/movie/modify/create') }}" class='nav-link'>Insert</a></li>
			<li class="nav-item"><a href="{{url("/reserve/".Auth::user()->id."/edit")}}" class='nav-link'>Reserves</a></li>
			<li class="nav-item"><a  href="{{ route('logout') }}"
				onclick="event.preventDefault();
							  document.getElementById('logout-form').submit();"  class="nav-link">
				 {{ __('Logout') }}
			 </a></li>
	
			 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				 @csrf
			 </form>		
			@else
			<li class="nav-item"><a href="{{ url('/') }}"  class="nav-link">Home</a></li>
			<li class="nav-item"><a href="{{url("/reserve/".Auth::user()->id."/edit")}}" class='nav-link'>Reserves</a></li>
			<li class="nav-item"><a href="{{ route('logout') }}"
				onclick="event.preventDefault();
							  document.getElementById('logout-form').submit();"  class="nav-link">
				 {{ __('Logout') }}
			 </a></li>
	
			 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				 @csrf
			 </form>
			@endif
		
		@else
		
			<li class="nav-item"><a  href="{{ url('/') }}" class="nav-link">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>

			@if (Route::has('register'))
				<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
			@endif
		@endauth
		@endif
	</ul>
</nav>

