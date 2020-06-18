<?php
// On inclut ce qui est nécessaire au fonctionnement de la page
include('includes/bootstrap.php');
include('templates/header.php');
?>

<div class="container mt-4">
    <section id="login" class="jumbotron text-center">
        <h1>Se connecter</h1>
    </section>
    <div class="row mt-5">
        <div class="col-8 col-offset-2">
            <!-- Formulaire de connexion -->
            <form method="POST" action="login_process.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Identifiant</label>
                    <input type="username" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                <label for="exampleInputRememberme"> Se souvenir de moi ?</label>
                    <select name="rememberme" class="form-control">
                        <option value="">Non</option> 
                        <option value="1">1 heure</option>    
                        <option value="2">2 heures</option> 
                        <option value="3">3 heures</option> 
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>