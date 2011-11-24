<form id="user-form" name="user-form" method="post" action="/<?php echo $this->eprint($this->WD);?>/register/">
    <fieldset>
        <legend>Informaci&oacute;n Personal</legend>
        <div class="clearfix" data-field="name">
            <label for="firstName">Nombre(s)</label>
            <div class="input">
                <input class="medium" id="firstName" name="firstName" size="30" type="text">
            </div>
        </div>
        <div class="clearfix" data-field="lastName">
            <label for="lastName">Apellidos</label>
            <div class="input">
                <input class="medium" id="lastName" name="lastName" size="30" type="text">
            </div>
        </div>
        <div class="clearfix" data-field="email">
            <label for="email">Correo Electr&oacute;nico</label>
            <div class="input">
                <input class="medium" id="email" name="email" size="35" type="email">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Datos de Cuenta</legend>
        <div class="clearfix" data-field="nickname">
            <label for="nickname">Usuario</label>
            <div class="input">
                <input class="medium" id="nickname" name="nickname" size="30" type="text">
            </div>
        </div>
        <div class="clearfix" data-field="password">
            <label for="password">Contrase&ntilde;a</label>
            <div class="input">
                <input class="medium" id="password" name="password" size="30" type="password">
            </div>
        </div>
    </fieldset>
    <div id="actions" class="actions">
        <input type="submit" class="btn primary" value="Continuar Registro">&nbsp;
        <a class="btn" href="/<?php echo $this->eprint($this->WD);?>/">Cancelar</a>
        <!--<button type="reset" class="btn">Cancelar</button>-->
    </div>
</form>
<script>
    $('#user-form').isHappy({
    fields: {
      '#firstName': {
        required: true,
        message: 'Ingresa tu nombre',
        test: happy.alpha
      },
      '#lastName': {
        required: true,
        message: 'Ingresa tus apellidos',
        test: happy.alpha
      },
      '#email': {
        required: true,
        message: 'Ingresa un correo electr&oacute;nico v&aacute;lido',
        test: happy.email
      },
      '#nickname': {
        required: true,
        message: 'Ingresa un usuario v&aacute;lido (sin caract&eacute;res especiales)',
        test: happy.alphaNumeric
      },
      '#password': {
        required: true,
        message: 'Ingresa una contrase&ntilde;a'
      }
    }
  });
</script>
