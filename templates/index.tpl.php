<form id="login-form" name="login-form" method="post" action="/<?php echo $this->eprint($this->WD);?>/login/">
<fieldset>
    <legend>Iniciar Sesi&oacute;n</legend>
    <div class="clearfix">
        <label for="nickname">Usuario</label>
        <div class="input">
            <input class="span5" id="nickname" name="nickname" type="text">
        </div>
    </div>
    <div class="clearfix">
        <label for="password">Contrase&ntilde;a</label>
        <div class="input">
            <input class="span5" id="password" name="password" type="password">
        </div>
    </div>
</fieldset>
    <div id="actions" class="actions">
        <input type="submit" class="btn primary" value="Entrar">&nbsp;
        <a class="btn" href="/<?php echo $this->eprint($this->WD);?>/register/">Registrarse</a>
    </div>
</form>
