<!DOCTYPE html>
<html>
	<head>
		<title>ATPro Admin</title>
		
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<link rel="icon" type="image/png" href="assets/AT-pro-logo.png"/>
		
		
		<!-- Import lib -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
		<link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free/css/all.min.css')}}">
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<!-- End import lib -->
		
		<link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
	</head>
	<body class="overlay-scrollbar">
		<!-- navbar -->
		<div class="navbar">
			<!-- nav left -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link">
						<i class="fas fa-bars" onclick="collapseSidebar()"></i>
					</a>
				</li>
				<li class="nav-item">
					<img src="{{asset('assets/AT-pro-black.png')}}" alt="ATPro logo" class="logo logo-light">
					<img src="{{asset('assets/AT-pro-white.png')}}" alt="ATPro logo" class="logo logo-dark">
				</li>
			</ul>
			<!-- end nav left -->
			<!-- form -->
			<!-- <form class="navbar-search">
				<input type="text" name="Search" class="navbar-search-input" placeholder="What you looking for...">
				<i class="fas fa-search"></i>
			</form> -->
			<!-- end form -->
			<!-- nav right -->
			<ul class="navbar-nav nav-right">
				<li class="nav-item mode">
					<a class="nav-link" href="#" onclick="switchTheme()">
						<i class="fas fa-moon dark-icon"></i>
						<i class="fas fa-sun light-icon"></i>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link">
						<i class="fas fa-bell dropdown-toggle" data-toggle="notification-menu"></i>
						<span class="navbar-badge">15</span>
					</a>
					<ul id="notification-menu" class="dropdown-menu notification-menu">
						<div class="dropdown-menu-header">
							<span>
								Notifications
							</span>
						</div>
						<div class="dropdown-menu-content overlay-scrollbar scrollbar-hover">
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-gift"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-tasks"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-gift"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-tasks"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-gift"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-tasks"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-gift"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-tasks"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-gift"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-tasks"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-gift"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-tasks"></i>
									</div>
									<span>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
										<br>
										<span>
											15/07/2020
										</span>
									</span>
								</a>
							</li>
						</div>
						<div class="dropdown-menu-footer">
							<span>
								View all notifications
							</span>
						</div>
					</ul>
				</li>
				<li class="nav-item avt-wrapper">
					<div class="avt dropdown">
						<img src="{{asset('assets/tuat.jpg')}}" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
						<ul id="user-menu" class="dropdown-menu">
							<li  class="dropdown-menu-item">
								<a class="dropdown-menu-link">
									<div>
										<i class="fas fa-user-tie"></i>
									</div>
									<span>Profile</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-cog"></i>
									</div>
									<span>Settings</span>
								</a>
							</li>
							<li  class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="far fa-credit-card"></i>
									</div>
									<span>Payments</span>
								</a>
							</li>
							<li  class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-spinner"></i>
									</div>
									<span>Projects</span>
								</a>
							</li>
							<li  class="dropdown-menu-item">
								<a href="#" class="dropdown-menu-link">
									<div>
										<i class="fas fa-sign-out-alt"></i>
									</div>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
			<!-- end nav right -->
		</div>
		<!-- end navbar -->
		<!-- sidebar -->
		<div class="sidebar">
			<ul class="sidebar-nav">
				<li class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-tachometer-alt"></i>
						</div>
						<span>
							Dashboard
						</span>
					</a>
				</li>
				<li class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link active">
						<div>
							<i class="fab fa-accusoft"></i>
						</div>
						<span>Lorem</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-tasks"></i>
						</div>
						<span>Morbi</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-spinner"></i>
						</div>
						<span>Praesent</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-check-circle"></i>
						</div>
						<span>Pellentesque</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-bug"></i>
						</div>
						<span>Morbi</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-chart-line"></i>
						</div>
						<span>Praesent</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-book-open"></i>
						</div>
						<span>Pellentesque</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-adjust"></i>
						</div>
						<span>Morbi</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fab fa-algolia"></i>
						</div>
						<span>Praesent</span>
					</a>
				</li>
				<li  class="sidebar-nav-item">
					<a href="#" class="sidebar-nav-link">
						<div>
							<i class="fas fa-audio-description"></i>
						</div>
						<span>Pellentesque</span>
					</a>
				</li>
			</ul>
		</div>
		<!-- end sidebar -->
		<!-- main content -->
		<div class="wrapper">
			@yield('content')
			<!-- <div class="row">
				<div class="col-3 col-m-6 col-sm-6">
					<div class="counter bg-primary">
						<p>
							<i class="fas fa-tasks"></i>
						</p>
						<h3>100+</h3>
						<p>To do</p>
					</div>
				</div>
				<div class="col-3 col-m-6 col-sm-6">
					<div class="counter bg-warning">
						<p>
							<i class="fas fa-spinner"></i>
						</p>
						<h3>100+</h3>
						<p>In progress</p>
					</div>
				</div>
				<div class="col-3 col-m-6 col-sm-6">
					<div class="counter bg-success">
						<p>
							<i class="fas fa-check-circle"></i>
						</p>
						<h3>100+</h3>
						<p>Completed</p>
					</div>
				</div>
				<div class="col-3 col-m-6 col-sm-6">
					<div class="counter bg-danger">
						<p>
							<i class="fas fa-bug"></i>
						</p>
						<h3>100+</h3>
						<p>Issues</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8 col-m-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<h3>
								Table
							</h3>
							<i class="fas fa-ellipsis-h"></i>
						</div>
						<div class="card-content">
							<table>
								<thead>
									<tr>
										<th>#</th>
										<th>Project</th>
										<th>Manager</th>
										<th>Status</th>
										<th>Due date</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>React</td>
										<td>Tran Anh Tuat</td>
										<td>
											<span class="dot">
												<i class="bg-success"></i>
												Completed
											</span>
										</td>
										<td>17/07/2020</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Vue</td>
										<td>Bui Nhu Sang</td>
										<td>
											<span class="dot">
												<i class="bg-warning"></i>
												In progress
											</span>
										</td>
										<td>18/07/2020</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Laravel</td>
										<td>Phan Nhat Truong</td>
										<td>
											<span class="dot">
												<i class="bg-warning"></i>
												In progress
											</span>
										</td>
										<td>17/07/2020</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Django</td>
										<td>Le Anh Tuan</td>
										<td>
											<span class="dot">
												<i class="bg-danger"></i>
												Delayed
											</span>
										</td>
										<td>07/07/2020</td>
									</tr>
									<tr>
										<td>5</td>
										<td>MEAN</td>
										<td>John Evan</td>
										<td>
											<span class="dot">
												<i class="bg-primary"></i>
												Pending
											</span>
										</td>
										<td>20/08/2020</td>
									</tr>
									<tr>
										<td>6</td>
										<td>MERN</td>
										<td>Robert</td>
										<td>
											<span class="dot">
												<i class="bg-primary"></i>
												Pending
											</span>
										</td>
										<td>20/08/2020</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-4 col-m-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<h3>
								Progress bar
							</h3>
							<i class="fas fa-ellipsis-h"></i>
						</div>
						<div class="card-content">
							<div class="progress-wrapper">
								<p>
									Less than 1 hour
									<span class="float-right">50%</span>
								</p>
								<div class="progress">
									<div class="bg-success" style="width: 50%"></div>
								</div>
							</div>
							<div class="progress-wrapper">
								<p>
									1 - 3 hours
									<span class="float-right">60%</span>
								</p>
								<div class="progress">
									<div class="bg-primary" style="width:60%"></div>
								</div>
							</div>
							<div class="progress-wrapper">
								<p>
									More than 3 hours
									<span class="float-right">40%</span>
								</p>
								<div class="progress">
									<div class="bg-warning" style="width:40%"></div>
								</div>
							</div>
							<div class="progress-wrapper">
								<p>
									More than 6 hours
									<span class="float-right">20%</span>
								</p>
								<div class="progress">
									<div class="bg-danger" style="width:20%"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-m-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<h3>
								Chartjs
							</h3>
						</div>
						<div class="card-content">
							<canvas id="myChart"></canvas>
						</div>
					</div>
				</div>
			</div> -->
		</div>
		<!-- end main content -->
		<!-- import script -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
		<script>
			
			const primaryColor = '#4834d4'
			const warningColor = '#f0932b'
			const successColor = '#6ab04c'
			const dangerColor = '#eb4d4b'

			const themeCookieName = 'theme'
			const themeDark = 'dark'
			const themeLight = 'light'

			const body = document.getElementsByTagName('body')[0]

			function setCookie(cname, cvalue, exdays) {
			var d = new Date()
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
			var expires = "expires="+d.toUTCString()
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
			}

			function getCookie(cname) {
			var name = cname + "="
			var ca = document.cookie.split(';')
			for(var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
				c = c.substring(1)
				}
				if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length)
				}
			}
			return ""
			}

			loadTheme()

			function loadTheme() {
				var theme = getCookie(themeCookieName)
				body.classList.add(theme === "" ? themeLight : theme)
			}

			function switchTheme() {
				if (body.classList.contains(themeLight)) {
					body.classList.remove(themeLight)
					body.classList.add(themeDark)
					setCookie(themeCookieName, themeDark)
				} else {
					body.classList.remove(themeDark)
					body.classList.add(themeLight)
					setCookie(themeCookieName, themeLight)
				}
			}

			function collapseSidebar() {
				body.classList.toggle('sidebar-expand')
			}

			window.onclick = function(event) {
				openCloseDropdown(event)
			}

			function closeAllDropdown() {
				var dropdowns = document.getElementsByClassName('dropdown-expand')
				for (var i = 0; i < dropdowns.length; i++) {
					dropdowns[i].classList.remove('dropdown-expand')
				}
			}

			function openCloseDropdown(event) {
				if (!event.target.matches('.dropdown-toggle')) {
					// 
					// Close dropdown when click out of dropdown menu
					// 
					closeAllDropdown()
				} else {
					var toggle = event.target.dataset.toggle
					var content = document.getElementById(toggle)
					if (content.classList.contains('dropdown-expand')) {
						closeAllDropdown()
					} else {
						closeAllDropdown()
						content.classList.add('dropdown-expand')
					}
				}
			}

			var ctx = document.getElementById('myChart')
			ctx.height = 500
			ctx.width = 500
			var data = {
				labels: ['January', 'February', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					fill: false,
					label: 'Completed',
					borderColor: successColor,
					data: [120, 115, 130, 100, 123, 88, 99, 66, 120, 52, 59],
					borderWidth: 2,
					lineTension: 0,
				}, {
					fill: false,
					label: 'Issues',
					borderColor: dangerColor,
					data: [66, 44, 12, 48, 99, 56, 78, 23, 100, 22, 47],
					borderWidth: 2,
					lineTension: 0,
				}]
			}

			var lineChart = new Chart(ctx, {
				type: 'line',
				data: data,
				options: {
					maintainAspectRatio: false,
					bezierCurve: false,
				}
			})

		</script>
		<!-- end import script -->
	</body>
</html>