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
        	<img src="../assets/img/eye.png" alt="View" width="16px" height="16px">
            <!--<span class="icon view"></span>-->
        </a>
        <a href="/<?php echo $this->WD; ?>/edit-device/<?php echo $this->eprint($this->device->id); ?>">
        	<img src="../assets/img/pencil.png" alt="View" width="16px" height="16px">
            <!--<span class="icon pencil"></span>-->
        </a>
        <a href="/<?php echo $this->WD; ?>/delete-device/<?php echo $this->eprint($this->device->id); ?>">
        	<img src="../assets/img/eraser.png" alt="View" width="16px" height="16px">
            <!--<span class="icon eraser"></span>-->
        </a>
    </td>
</tr>
