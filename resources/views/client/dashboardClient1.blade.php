<!DOCTYPE html>
<html lang="en">

<head>
  <title>fermeLaitiere</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
  :root {
    font-size: 16px;
    font-family: 'Open Sans';
    --text-primary: #b6b6b6;
    --text-secondary: #ececec;
    --bg-primary: #23232e;
    --bg-secondary: #141418;
    --transition-speed: 600ms;
  }

  body {
    color: black;
    background-color: white;
    margin: 0;
    padding: 0;
  }

  body::-webkit-scrollbar {
    width: 0.25rem;
  }

  body::-webkit-scrollbar-track {
    background: #1e1e24;
  }

  body::-webkit-scrollbar-thumb {
    background: #6649b8;
  }

  main {
    margin-left: 5rem;
    padding: 1rem;
  }

  .navbar {
    position: fixed;
    background-color: var(--bg-primary);
    transition: width 600ms ease;
    overflow: scroll;
  }

  .navbar-nav {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100%;
  }

  .nav-item {
    width: 100%;
  }

  .nav-item:last-child {
    margin-top: auto;
  }

  .nav-link {
    display: flex;
    align-items: center;
    height: 5rem;
    color: var(--text-primary);
    text-decoration: none;
    filter: grayscale(100%) opacity(0.7);
    transition: var(--transition-speed);
  }

  .nav-link:hover {
    filter: grayscale(0%) opacity(1);
    background: var(--bg-secondary);
    color: var(--text-secondary);
  }

  .link-text {
    display: none;
    margin-left: 1rem;
  }

  .nav-link svg {
    width: 2rem;
    min-width: 2rem;
    margin: 0 1.5rem;
  }

  .fa-primary {
    color: #ff7eee;
  }

  .fa-secondary {
    color: #df49a6;
  }

  .fa-primary,
  .fa-secondary {
    transition: var(--transition-speed);
  }

  .logo {
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 1rem;
    text-align: center;
    color: var(--text-secondary);
    background: var(--bg-secondary);
    font-size: 1.5rem;
    letter-spacing: 0.3ch;
    width: 100%;
  }

  .logo svg {
    transform: rotate(0deg);
    transition: var(--transition-speed);
  }

  .logo-text {
    display: inline;
    position: absolute;
    left: -999px;
    transition: var(--transition-speed);
  }

  .navbar:hover .logo svg {
    transform: rotate(-180deg);
  }

  /* Small screens */
  @media only screen and (max-width: 600px) {
    .navbar {
      bottom: 0;
      width: 100vw;
      height: 5rem;
    }

    .logo {
      display: none;
    }

    .navbar-nav {
      flex-direction: row;
    }

    .nav-link {
      justify-content: center;
    }

    main {
      margin: 0;
    }
  }

  /* Large screens */
  @media only screen and (min-width: 600px) {
    .navbar {
      top: 0;
      width: 5rem;
      height: 100vh;
    }

    .navbar:hover {
      width: 16rem;
    }

    .navbar:hover .link-text {
      display: inline;
    }

    .navbar:hover .logo svg {
      margin-left: 11rem;
    }

    .navbar:hover .logo-text {
      left: 0px;
    }
  }

  .dark {
    --text-primary: #b6b6b6;
    --text-secondary: #ececec;
    --bg-primary: #23232e;
    --bg-secondary: #141418;
  }

  .light {
    --text-primary: #1f1f1f;
    --text-secondary: #000000;
    --bg-primary: #ffffff;
    --bg-secondary: #e4e4e4;
  }

  .solar {
    --text-primary: #576e75;
    --text-secondary: #35535c;
    --bg-primary: #fdf6e3;
    --bg-secondary: #f5e5b8;
  }

  .theme-icon {
    display: none;
  }

  .dark #darkIcon {
    display: block;
  }

  .light #lightIcon {
    display: block;
  }

  .solar #solarIcon {
    display: block;
  }

  /*Pour le menu deroulant*/
  .boutonmenuprincipal {
    background-color: #e83737;
    color: white;
    border: none;
    cursor: pointer;
    padding: 20px;
    margin-top: 20px;
    font-size: 30px;
  }

  .boutonmenuprincipal:hover {
    background-color: #ff4444;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-child {
    display: none;
    background-color: #f28c8c;
    min-width: 50px;
  }

  .dropdown-child a {
    color: white;
    padding: 20px;
    text-decoration: none;
    display: block;
  }

  .dropdown:hover .dropdown-child {
    display: block;
  }
</style>



<body>
  <nav class="navbar">
    <ul class="navbar-nav">
      <li class="logo">
        <a href="#" class="nav-link">
          <span class="link-text logo-text">dashboard</span>
          <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="angle-double-right" role="img" viewBox="0 0 448 512" class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
            <g class="fa-group">
              <path fill="currentColor" d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z" class="fa-secondary"></path>
              <path fill="currentColor" d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z" class="fa-primary"></path>
            </g>
          </svg>
        </a>
      </li>
      <li class="nav-item">

        <a href="commander" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" class="fa-secondary">
            </path>
          </svg>

          <span class="link-text">Faire une commande</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="promotion" class="nav-link">

          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" class="fa-secondary">
            </path>
          </svg>
          <span class="link-text">Promotion</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="historique" class="nav-link">

          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" class="fa-secondary">
            </path>
            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" class="fa-secondary">
            </path>
            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" class="fa-secondary">
            </path>
          </svg>
          <span class="link-text">Historique</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('profile')}}" class="nav-link">

          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" class="fa-secondary">
            </path>
          </svg>
          <span class="link-text">Modifier son compte</span>
        </a>
      </li>

      <li class="nav-item">

      <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off fa-2x"></i>
         <span class="link-text">Deconexion</span>
        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

        <!-- <a href="compte" class="nav-link">

          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" class="fa-secondary">
            </path>
          </svg>
          <span class="link-text">Deconexion</span>
        </a> -->
      </li>

      <li class="nav-item" id="themeButton">
        <a href="#" class="nav-link">
          <svg class="theme-icon" id="lightIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="moon-stars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x">
            <g class="fa-group">
              <path fill="currentColor" d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z" class="fa-secondary"></path>
              <path fill="currentColor" d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z" class="fa-primary"></path>
            </g>
          </svg>
          <svg class="theme-icon" id="solarIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="sun" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sun fa-w-16 fa-7x">
            <g class="fa-group">
              <path fill="currentColor" d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z" class="fa-secondary"></path>
              <path fill="currentColor" d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z" class="fa-primary"></path>
            </g>
          </svg>
          <svg class="theme-icon" id="darkIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="sunglasses" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-sunglasses fa-w-18 fa-7x">
            <g class="fa-group">
              <path fill="currentColor" d="M574.09 280.38L528.75 98.66a87.94 87.94 0 0 0-113.19-62.14l-15.25 5.08a16 16 0 0 0-10.12 20.25L395.25 77a16 16 0 0 0 20.22 10.13l13.19-4.39c10.87-3.63 23-3.57 33.15 1.73a39.59 39.59 0 0 1 20.38 25.81l38.47 153.83a276.7 276.7 0 0 0-81.22-12.47c-34.75 0-74 7-114.85 26.75h-73.18c-40.85-19.75-80.07-26.75-114.85-26.75a276.75 276.75 0 0 0-81.22 12.45l38.47-153.8a39.61 39.61 0 0 1 20.38-25.82c10.15-5.29 22.28-5.34 33.15-1.73l13.16 4.39A16 16 0 0 0 180.75 77l5.06-15.19a16 16 0 0 0-10.12-20.21l-15.25-5.08A87.95 87.95 0 0 0 47.25 98.65L1.91 280.38A75.35 75.35 0 0 0 0 295.86v70.25C0 429 51.59 480 115.19 480h37.12c60.28 0 110.38-45.94 114.88-105.37l2.93-38.63h35.76l2.93 38.63c4.5 59.43 54.6 105.37 114.88 105.37h37.12C524.41 480 576 429 576 366.13v-70.25a62.67 62.67 0 0 0-1.91-15.5zM203.38 369.8c-2 25.9-24.41 46.2-51.07 46.2h-37.12C87 416 64 393.63 64 366.11v-37.55a217.35 217.35 0 0 1 72.59-12.9 196.51 196.51 0 0 1 69.91 12.9zM512 366.13c0 27.5-23 49.87-51.19 49.87h-37.12c-26.69 0-49.1-20.3-51.07-46.2l-3.12-41.24a196.55 196.55 0 0 1 69.94-12.9A217.41 217.41 0 0 1 512 328.58z" class="fa-secondary"></path>
              <path fill="currentColor" d="M64.19 367.9c0-.61-.19-1.18-.19-1.8 0 27.53 23 49.9 51.19 49.9h37.12c26.66 0 49.1-20.3 51.07-46.2l3.12-41.24c-14-5.29-28.31-8.38-42.78-10.42zm404-50l-95.83 47.91.3 4c2 25.9 24.38 46.2 51.07 46.2h37.12C489 416 512 393.63 512 366.13v-37.55a227.76 227.76 0 0 0-43.85-10.66z" class="fa-primary"></path>
            </g>
          </svg>
          <span class="link-text">Changer la mode</span>
        </a>
      </li>
    </ul>
  </nav>


  <!--**************************************************  debut  **********************************************************-->

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Float four columns side by side */
    .column {
      float: left;
      width: 25%;
      padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {
      margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }

    /* Style the counter cards */
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 16px;
      margin: 16px;
      text-align: center;
      background-color: #f1f1f1;
    }

    img {
      max-width: 100%;
    }
  </style>
  <h1 style="text-align:center;">Nos vache et produit produits Laitières</h1>

  <div class="column">
    <div class="card">
      <img src="images/bovin/vachePetit.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <p class="card-text">nom: Nana <br>description: race Hollande </p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="price">2.500.000 F</span>
        <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/bovin/VacheS1.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">nom: Nini <br>description: race Hollande </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">700.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/bovin/taureauS2.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">nom: Minet <br>description: race Italiane </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.000.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/bovin/unVeau.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">nom: Ana <br>description: race Italiane-sud </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.050.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/bovin/taureauS3.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">nom: Lahna <br>description: race Pakistan </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.250.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/bovin/coupleBovin.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">nom: kahona <br>description: race Indou </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">1.700.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/bovin/velleS.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">nom: kahona <br>description: race Indou </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">175.000 F</span>
          <a href="achat" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/lait/lait20l.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">Lait pur<br>date expiration</p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">10.000 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/lait/lait5l.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">Lait pur<br>date expiration</p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">3.000 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/lait/lait1l.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">Lait pur <br>date expiration </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">600 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><span class="fa fa-eye"></span></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/lait/lait0.5l.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">Lait pur<br>date expiration </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">300 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/lait/seau20L.jpg" class="card-img-top img-fluid" alt="Responsive image">
      <div class="card-body">
        <p class="card-text">Lait pur<br>date expiration </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="price">10.000 F</span>
          <a href="#" class="btn btn-sm btn-outline-primary btn-warning"><i class="fa fa-eye"></i></a>
        </div>
      </div>
    </div>
  </div>

  </div>

  <!--**************************************************   fin   ************************************************************-->


  <script>
    const themeMap = {
      dark: "light",
      light: "solar",
      solar: "dark"
    };

    const theme = localStorage.getItem('theme') ||
      (tmp = Object.keys(themeMap)[0],
        localStorage.setItem('theme', tmp),
        tmp);
    const bodyClass = document.body.classList;
    bodyClass.add(theme);

    function toggleTheme() {
      const current = localStorage.getItem('theme');
      const next = themeMap[current];

      bodyClass.replace(current, next);
      localStorage.setItem('theme', next);
    }

    document.getElementById('themeButton').onclick = toggleTheme;
  </script>

</body>

</html>