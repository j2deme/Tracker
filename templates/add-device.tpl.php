<form id="device-form" name="device-form" method="post" action="/<?php echo $this->eprint($this->WD);?>/add-device/">
    <fieldset>
        <legend>Informaci&oacute;n del Dispositivo</legend>
        <div class="clearfix">
            <label for="model">Modelo</label>
            <div class="input">
                <input class="medium" id="model" name="model" type="text" placeholder="HTC Desire">
            </div>
        </div>
        <div class="clearfix">
            <label for="user">Usuario</label>
            <div class="input">
                <input class="medium" id="user" name="user" type="text" placeholder="John Doe">
            </div>
        </div>
        <div class="clearfix">
            <label for="uid">Identificador del equipo</label>
            <div class="input">
                <input class="medium" id="uid" name="uid" type="text" placeholder="">
            </div>
        </div>
    </fieldset>
    <div id="actions" class="actions">
        <input type="submit" class="btn primary" value="Asociar">&nbsp;
        <a class="btn" href="/<?php echo $this->eprint($this->WD);?>/dashboard/">Cancelar</a>
    </div>
</form>
<script>
    $('#device-form').isHappy({
    fields: {
      '#model': {
        required: true,
        message: 'Ingresa el modelo del smartphone o tablet',
        test: happy.alpha
      },
      '#user': {
        required: true,
        message: '¿Qui&eacute;n usa el dispositivo?',
        test: happy.alpha
      },
      '#uid': {
        required: true,
        message: 'Ingresa el identificador de tu equipo',
      }
    }
  });
</script>
