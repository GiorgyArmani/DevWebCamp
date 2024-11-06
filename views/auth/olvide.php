<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo;?></h2>
    <p class="auth__text">Inicia la recuperacion de tu cuenta </p>

<?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form class="formulario" method="POST" action="/olvide">

        <div class="formulario__campo">
            <label for="email"  class="formulario__label">Email</label>
            <input type="email" 
            class="formulario__input" 
            placeholder="Tu Email de Recuperación"
            id="email"
            name="email">
        </div>

        <input type="submit" class="formulario__submit" value="Enviar instrucciones" />

    </form>
    <div class="acciones">
        <a href="/login" class="acciones__enlace">Ya tienes cuenta? Inicia sesion!</a>
        <a href="/crear" class="acciones__enlace">No tienes una cuenta? Crea una!</a>
    </div>


</main>