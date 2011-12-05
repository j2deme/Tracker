<tr>
    <td><?php echo $this->eprint($this->num); ?></td>
	<td>
    <?php
        echo "<abbr class='timeago' title='".date('c',$this->log->timestamp)."'>".spanish_months(date('n',$this->log->timestamp)).date(' t, Y',$this->log->timestamp)."</abbr>";
    ?>
    </td>
    <td><?php echo $this->eprint($this->address); ?></td>
</tr>
