<!--header menu start-->
<div class="header">
	<div class="header-menu">
		<div class="title">KoSsam <span>Ferme</span></div>
		<div class="sidebar-btn">
			<i class="fa fa-bars"></i>
		</div>
		<ul>
			<li><a href="{{ route('production_lait_aliment') }}"><i class="fa fa-bell"></i></a></li>
			<li><a href="{{ route('profile.admin') }}"><i class="fa fa-user"></i></a></li>
			<li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
				document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					<!-- @csrf -->
					{{ csrf_field() }}
				</form>
			</li>
		</ul>
	</div>
</div>
<!--header menu end-->
