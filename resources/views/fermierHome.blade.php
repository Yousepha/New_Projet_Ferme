@extends('layouts.layout_fermier')
    
@section('content')
<style>

/* body{
  	font-family:'Mntserrat', Sans-serif;
  	background: #fff4e0;
  } */
  .color-white{
  	color:white;
  }
  .flip-box{
  	transform-style: preserve-3d;
  	perspective:1000px;
  	cursor:pointer;
  	margin-top:50px;
  }

  .flip-box-front,
  .flip-box-back{
  	background-size: cover;
  	background-position: center;
  	border-radius: 8px;
  	min-height: 475px;
  	transition:transform 0.7s cubic-bezier(.4,.2,.2,1);
  	backface-visibility: hidden;
  }

.flip-box-front{
	transform:rotateY(0deg);
	transform-style: preserve-3d;
}

.flip-box:hover .flip-box-front{
	transform:rotateY(-180deg);
	transform-style: preserve-3d;
}

.flip-box-back{
	position:absolute;
	top:0;
	left:0;
	width:100%;
	transform: rotateY(180deg);
	transform-style: preserve-3d;
}

.flip-box:hover .flip-box-back{
	transform:rotateY(0deg);
	transform-style: preserve-3d;
}

.flip-box .inner{
	position:absolute;
	left:0;
	width:100%;
	padding:60px;
	outline:1px solid transparent;
	perspective: inherit;
	z-index: 2;
	transform: translateY(-50%)translateZ(60px) scale(.94);
	top:50%;
}

.flip-box-header{
	font-size:30px;

}

.flip-box p{
	font-size:20px;
	line-height: 1.5rem;

}

.flip-box-img{
	margin-top:25px;
}

.flip-box-button{
	background-color: transparent;
	border:2px solid #fff;
	border-radius: 2px;
	color:#fff;
	cursor:pointer;
	font-size:20px;
	font-weight: bold;
	margin-top:25px;
	padding:15px 20px;
	text-transform: uppercase;


}

</style>

  <div class="container">
    <div class="row">
      <div class="box-item col-md-4">
        <div class="flip-box">
          <div class="flip-box-front text-center" style="background-image: url('{{asset('fermier_imgs/alimentation_animaux.jpg')}}');">
            <div class="inner color-white">
              <h3 class="flip-box-header">Alimentation des Bovins</h3>
               <p>Consultez le Stock de l'Alimentation</p>
                <!-- <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img"> -->
            </div>
        </div>
        <div class="flip-box-back text-center" style="background-image: url('{{asset('fermier_imgs/alimentation_animaux.jpg')}}');">
          <div class="inner color-white">
            <h3 class="flip-box-header">Alimentation des Bovins</h3>
            <p>Consultez le Stock de l'Alimentation</p>
            <a href="{{ route('stocks.index') }}"><button class="flip-box-button">Accèder</button></a>
          </div>
      </div>
    </div>
  </div>

   <div class="box-item col-md-4">
        <div class="flip-box">
          <div class="flip-box-front text-center" style="background-image: url('{{asset('fermier_imgs/pesage.jpg')}}');">
            <div class="inner color-white">
              <h3 class="flip-box-header">Pesage en fonction de l'alimentation</h3>
               <p>Effet de l’alimentation des animaux sur la qualité de la viande et du lait</p>
                <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
            </div>
        </div>
        <div class="flip-box-back text-center" style="background-image: url('{{asset('fermier_imgs/pesage.jpg')}}');">
          <div class="inner color-white">
            <h3 class="flip-box-header">Pesage en fonction de l'alimentation</h3>
            <p>Effet de l’alimentation des animaux sur la qualité de la viande et du lait</p>
            <button class="flip-box-button">Accèder</button>
          </div>
      </div>
    </div>
  </div>

   <div class="box-item col-md-4">
        <div class="flip-box">
          <div class="flip-box-front text-center" style="background-image: url('{{asset('fermier_imgs/traite.jpg')}}');">
            <div class="inner color-white">
              <h3 class="flip-box-header">Production de lait par vache</h3>
               <p>La traite se fait soit manuellement, soit à l'aide de machines produisant massage et aspiration. Dans tous les cas, l'hygiène doit être considérée.</p>
                <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
            </div>
        </div>
        <div class="flip-box-back text-center" style="background-image: url('{{asset('fermier_imgs/traite.jpg')}}');">
          <div class="inner color-white">
            <h3 class="flip-box-header">Production de lait par vache</h3>
            <p>pour le confort de l'animal, il faut pratiquer la traite 2 fois par jour, matin et soir.</p>
            <button class="flip-box-button">Accèder</button>
          </div>
      </div>
    </div>
  </div>
</div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
@endsection
