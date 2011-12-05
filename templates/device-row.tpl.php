<!-- places-row.tpl.php -->
<tr>
    <td><?php echo $this->eprint($this->num); ?></td>
    <td><?php echo $this->eprint($this->device->user); ?></td>
    <td><?php echo $this->eprint($this->device->model); ?></td>
    <td>
    <?php
        echo $this->eprint($this->device->place)."&nbsp;";
        echo "<abbr class='timeago' title='".date('c',$this->device->createdOn)."'>".spanish_months(date('n',$this->device->createdOn)).date(' t, Y',$this->device->createdOn)."</abbr>";
    ?>
    </td>
    <td>

        <a href="/<?php echo $this->WD; ?>/device/<?php echo $this->eprint($this->device->id); ?>">
        	<img src="../assets/img/eye.png" alt="Ver" width="16px" height="16px"/>
            <!--<span class="icon view"></span>-->
        </a>
        <a href="/<?php echo $this->WD; ?>/edit-device/<?php echo $this->eprint($this->device->id); ?>">
        	<img src="../assets/img/pencil.png" alt="Editar" width="16px" height="16px"/>
            <!--<span class="icon pencil"></span>-->
        </a>
        <!--<a href="/<?php echo $this->WD; ?>/delete-device/<?php echo $this->eprint($this->device->id); ?>">-->
        <a data-controls-modal="delete-device-<?php echo $this->device->id;?>" data-backdrop="static">
        	<img src="../assets/img/eraser.png" alt="Borrar" width="16px" height="16px"/>
            <!--<span class="icon eraser"></span>-->
        </a>
        <div id="delete-device-<?php echo $this->device->id;?>" class="modal fade">
	      	<div class="modal-header">
	        	<a href="#" class="close">x</a>
	        	<h3>Desasociar Dispositivo</h3>
	      	</div>
	      	<div class="modal-body">
	        	<p>¿Esta seguro que desea desasociar el dispositivo?</p>
	        	<p>Una vez desasociado se borrar&aacute;n todos los registros y no se podr&aacute;n recuperar.</p>
	      	</div>
	      	<div class="modal-footer">
	      		<a class="btn" onclick="$(function(){$('#delete-device-<?php echo $this->device->id;?>').modal('hide')});">Cancelar</a>
	        	<a class="btn danger" href="/<?php echo $this->WD; ?>/delete-device/<?php echo $this->device->id; ?>">Continuar</a>
	      	</div>
    	</div>
    </td>
</tr>
