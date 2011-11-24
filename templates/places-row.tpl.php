<!-- places-row.tpl.php -->
<tr>
    <td><?php echo $this->eprint($this->num); ?></td>
    <td><?php echo $this->eprint($this->place->name); ?></td>
    <td><?php echo $this->eprint($this->place->desc); ?></td>
    <td><?php echo $this->eprint($this->place->rating); ?></td>
    <td>
    <?php
        echo "<abbr class='timeago' title='".date('c',$this->place->createdOn)."'>".spanish_months(date('n',$this->place->createdOn)).date(' t, Y',$this->place->createdOn)."</abbr>";
    ?>
    </td>
    <td>
        <a href="/WIMC/places/view/<?php echo $this->eprint($this->place->id); ?>">
            <img src="/WIMC/assets/img/magnifier.png" alt="Ver" width="16px" height="16px"/>
        </a>&nbsp;
        <a href="/WIMC/places/delete/<?php echo $this->eprint($this->place->id); ?>">
            <img src="/WIMC/assets/img/pencil.png" alt="Editar" width="16px" height="16px"/>
        </a>&nbsp;
        <a href="/WIMC/places/delete/<?php echo $this->eprint($this->place->id); ?>">
            <img src="/WIMC/assets/img/eraser.png" alt="Borrar" width="16px" height="16px"/>
        </a>
    </td>
</tr>
