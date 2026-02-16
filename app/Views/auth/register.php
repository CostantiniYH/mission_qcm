<main class="container">
    <section class="row">
        <div class="col-md-5 mx-auto text-black">
            <form class="bg-white p-5 rounded shadow text-center" action="register" method="post">
                <legend class="">inscription</legend>
                <input class="d-block mx-auto mb-3 form-control" type="text" name="nom" id="nom" 
                placeholder="Nom" required>
                <input class="d-block mx-auto mb-3 form-control" type="text" name="prenom" id="prenom" 
                placeholder="Prenom" required>
                <input class="d-block mx-auto mb-3 form-control" type="text" name="email" id="email" 
                placeholder="Email" required>
                <input class="d-block mx-auto mb-3 form-control" type="password" name="password" 
                id="password" placeholder="Password" required>
                <input class="d-block mx-auto mb-3 form-control" type="password" name="password2" 
                id="password2" placeholder="Confirmer password" required>
                <input class="d-block mx-auto mb-3 form-control btn btn-primary" type="submit" name="register" 
                value="S'inscrire">
                <p>Si vous êtes déjà inscrit
                    <a class="" href="register">connectez-vous</a>
                </p>
            </form>

        </div>
    </section>
</main>