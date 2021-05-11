@extends('/layouts.client_master')
    
@section('content')

<style>
/* html,body
{
    width: 500px;
    margin: auto;
} */
.container-profile
{
    width: 500px;
    margin: 20px auto;
}

.preview
{
    padding: 10px;
    position: relative;
}

.preview i
{
    color: white;
    font-size: 35px;
    transform: translate(50px,130px);
}

.preview-img
{
    border-radius: 100%;
    box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.7);
}

.browse-button
{
    width: 200px;
    height: 200px;
    border-radius: 100%;
    position: absolute; /* Tweak the position property if the element seems to be unfit */
    top: 10px;
    left: 132px;
    background: linear-gradient(180deg, transparent, black);
    opacity: 0;
    transition: 0.3s ease;
}

.browse-button:hover
{
    opacity: 1;
}

.browse-input
{
    width: 200px;
    height: 200px;
    border-radius: 100%;
    transform: translate(-1px,-26px);
    opacity: 0;
}

.form-group
{
    width:  250px;
    margin: 10px auto;
}

.form-group input
{
    transition: 0.3s linear;
}

.form-group input:focus
{
    border: 1px solid green;
    box-shadow: 0 0 0 0;
}

.Error
{
    color: crimson;
    font-size: 13px;
}

.Back
{
    font-size: 25px;
}
</style>
<!-- fin css -->
    <div class="container-profile">
       <div class="Back">
            <i class="fa fa-arrow-left" onclick="Back()"></i>
        </div>
        <p class="h2 text-center">Formulaire de profile</p>
        <form action="" method="post">
            <div class="preview text-center">
                <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
                <div class="browse-button">
                    <i class="fa fa-pencil-alt"></i>
                    <input class="browse-input" type="file" required name="UploadedFile" id="UploadedFile"/>
                </div>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Nom Complet:</label>
                <input class="form-control" type="text" name="fullname" required placeholder="Enter Your Full Name"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" required placeholder="Entrer votre Email"/>
                <span class="Error"></span>
            </div>

            <div class="form-group">
                <label>Telephone:</label>
                <input class="form-control" type="number" name="telephone" required placeholder="Entrer votre Numero de téléphonne"/>
                <span class="Error"></span>
            </div>

            <div class="form-group">
                <label>Adresse:</label>
                <input class="form-control" type="text" name="text" required placeholder="Entrer votre adresse"/>
                <span class="Error"></span>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" required placeholder="Entrer votre password"/>
                <span class="Error"></span>
            </div>
            <!-- <div class="form-group">
                <label>Gender:</label><br/>
                <label><input type="radio" name="gender" required value="Male" checked /> Male</label>
                <label><input type="radio" name="gender" required value="Female" /> Female</label>
                <label><input type="radio" name="gender" required value="Other" /> Other</label>
                <span class="Error"></span>
            </div> -->
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" value="Confirmer"/>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		function Back()
		{
    			window.history.back();
		}
	</script>
<!-- </body>
</html> -->

@endsection