<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');
include('templates/header.php');
?>

<div class="container mt-4">
    <section id="register" class="jumbotron text-center">
        <h1>S'inscrire</h1>
    </section>
    <div class="row mt-5">
        <div class="col-8 col-offset-2">
            <!-- Formulaire de connexion -->
            <form method="POST" action="signup_process.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Identifiant</label>
                    <input type="username" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirmation mot de passe</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
              
                <button type="submit" class="btn btn-primary">S'enregistrer</button>
            </form>
        </div>
    </div>
</div>
<?php include('templates/footer.php'); ?>