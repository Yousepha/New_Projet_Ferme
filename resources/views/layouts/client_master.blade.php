<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<!-- <link rel="stylesheet" href="styles.css"> -->

    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@400;600&display=swap');

        *{
            font-family: 'Baloo Paaji 2', cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }

        body{
            background: #f5f5f5;
        }

        .top_navbar{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: #fff;
            box-shadow: 1px 0 2px rgba(0,0,0,0.125);
            display: flex;
            align-items: center;
        }

        .top_navbar .logo{
            width: 250px;
            font-size: 25px;
            font-weight: 600;
            padding: 0 25px;
            color: #007dc3;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-right: 1px solid #f5f5f5;
        }

        .top_navbar .logo span{
            font-weight: 400;
        }

        .top_navbar .menu{
            width: calc(100% - 250px);
            padding: 0 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top_navbar .hamburger{
            font-size: 25px;
            cursor: pointer;
            color: #005faf;
        }

        .top_navbar .hamburger:hover{
            color: #007dc3;
        }

        .top_navbar .menu .profile_wrap{
            padding-left: 25px;
            border-left: 1px solid #f5f5f5;
        }

        .top_navbar .menu .profile img{
            width: 70px;
            height: 50px;
            border-radius: 50%;
        }

        .top_navbar .menu .profile{
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .top_navbar .menu .profile .name{
            margin: 0 15px;
        }

        .hover_collapse .sidebar{
            width: 70px;
        }

        .hover_collapse .sidebar ul li a .text{
            display: none;
        }

        .sidebar{
            position: fixed;
            top: 60px;
            left: 0;
            width: 250px;
            height: 100%;
            background: #005faf;
        }

        .sidebar ul li a{
            display: block;
            padding: 12px 25px;
            border-bottom: 1px solid #0e94d4;
            color: #0e94d4;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .sidebar ul li a .icon{
            font-size: 18px;
            vertical-align: middle;
            transition: background 0.2s ease;
        }

        .sidebar ul li a .text{
            margin-left: 10px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .sidebar ul li a:hover{
            background: #0e94d4;
            color: #fff;
        }

        .click_collapse .sidebar{
            transition: all 0.2s ease;
        }

        .main_container{
            margin-top: 60px;
            margin-left: 70px;
            padding: 25px;
            width: calc(100% - 70px);
        }

        .main_container .content{
            background: #fff;
            padding: 25px;
            margin-bottom: 25px;
            text-align: justify;
        }

        .click_collapse .main_container{
            width: calc(100% - 250px);
            margin-left: 250px;
            transition: all 0.2s ease;
        }

    </style>
</head>
<body>
	
<div class="wrapper hover_collapse">
	<div class="top_navbar sticky-top">
		<div class="logo">Menu<span></span></div>
		<div class="menu">
			<div class="hamburger">
				<i class="fa fa-bars"></i>
			</div>
			<div class="profile_wrap">
				<div class="profile">
					<img src="{{asset('images/fermier.jpg')}}" alt="profile_pic">
					<span class="name">{{ Auth::user()->full_name }}</span>
					<!-- <span class="icon">
						<i class="fa fa-angle-down"></i>
					</span> -->
				</div>
			</div>
		</div>
	</div>

	<div class="sidebar">
		<div class="sidebar_inner">
		<ul>
            <li>
                <a href="{{route('accueil_client')}}">
                    <span class="icon"><i class="fa fa-home fa-2x"></i></span>
                    <span class="text">Accueil</span>
                </a>
            </li>
            <li>
                <a href="{{route('cart_index_client')}}">
                    <sup class="badge badge-pill badge-dark"style="color: yellow;" >{{ Cart::getTotalQuantity() }}</sup>
                    <span class="icon"><i class="fa fa-shopping-cart fa-2x">
                    </i></span>
                    <span class="text">Panier</span>
                </a>
            </li>
			<li>
				<a href="{{route('promotion')}}">
					<span class="icon"><i class="fa fa-bell fa-2x"></i></span>
					<span class="text">Promotion</span>
				</a>
			</li>
			<li>
				<a href="{{route('historique')}}">
					<span class="icon"><i class="fa fa-clock-o fa-2x"></i></span>
					<span class="text">Historique</span>
				</a>
			</li>
			<li>
				<a href="{{route('compte')}}">
					<span class="icon"><i class="fa fa-user fa-2x"></i></span>
					<span class="text">Profile</span>
				</a>
			</li>
            <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-power-off fa-2x"></i>
                <span class="text">Deconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    <!-- @csrf -->
                    {{ CSRF_field() }}
                </form>
            </li>
		</ul>
		</div>
	</div>

	<div class="main_container">

        @yield('content')
		
	</div>
</div>


<script>
    var li_items = document.querySelectorAll(".sidebar ul li");
    var hamburger = document.querySelector(".hamburger");
    var wrapper = document.querySelector(".wrapper");


    // li_items.forEach((li_item)=>{
    //     li_item.addEventListener("mouseenter", ()=>{
    //         if(wrapper.classList.contains("click_collapse")){
    //             return;
    //         }
    //         else{
    //             li_item.closest(".wrapper").classList.remove("hover_collapse");
    //         }
    //     })
    // })

    li_items.forEach((li_item)=>{
        li_item.addEventListener("mouseleave", ()=>{
            if(wrapper.classList.contains("click_collapse")){
                return;
            }
            else{
                li_item.closest(".wrapper").classList.add("hover_collapse");
            }
        })
    })



    hamburger.addEventListener("click", () => {
        hamburger.closest(".wrapper").classList.toggle("click_collapse");
        hamburger.closest(".wrapper").classList.toggle("hover_collapse");
    })

</script>
</body>
</html>