<!-- <footer>
    <p class="alert">
        &copy; Copyright {{date('Y')}}
        Tout droit Réservé
    </p>
</footer> -->
<style>

.footer{
	position: sticky;
	top: 100%;
}
/*footer*/
.site-footer {
    background: #1cABa4;
    color: #fff;
    padding: 15px 0;
}

.site-footer p {
  margin-bottom: 5px;
}

.credits, .credits a {
  color: #fff;
}

.go-top {
    margin-right: 1%;
    margin-top: -25px;
    float: right;
    background: rgba(255,255,255,.5);
    width: 20px;
    height: 20px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
}

.go-top i {
    color: #2A3542;
}

/* .site-min-height {
    min-height: 900px;
} */


</style>
<!--footer start-->
<footer class="site-footer footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>{{date('Y')}}</strong>. Tout droit Réservé
        </p>
        <div class="credits">
          
          Créer avec laravel8.x et bootstrap <a href="/admin/home">Accueil</a>
        </div>
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
</footer>
    <!--footer end-->