<div class="row">
    <div class="span10">
        <div class="row">
            <div class="span3">
                <p><h3>Modelo</h3>
                <?php echo $this->eprint($this->device->model); ?></p>
                <p><h3>Asociado</h3>
                <?php
                    echo "<abbr class='timeago' title='".date('c',$this->device->createdOn)."'>".spanish_months(date('n',$this->device->createdOn)).date(' t, Y',$this->device->createdOn)."</abbr>";
                ?></p>
            </div>
            <div class="span4">
                <p><h3>Usuario</h3>
                <?php echo $this->eprint($this->device->user); ?></p>
                <p><h3>Actualizado</h3>
                <?php
                    echo "<abbr class='timeago' title='".date('c',$this->device->lastUpdated)."'>".spanish_months(date('n',$this->device->lastUpdated)).date(' t, Y',$this->device->lastUpdated)."</abbr>";
                ?></p>
            </div>
            <div class="span3">
                <p><h3>MAC</h3>
                <?php echo $this->eprint($this->device->mac); ?></p>
            </div>
<script>
    $(function(){
        $("#map").gmap3(
            { action: 'addMarkers',
              markers:[
                {lat:23.73034,lng:-99.16043,data: 'Grande Estación'},
                {lat:23.76316,lng:-99.14115,data: 'Grande Campestre'}
              ],
              marker:{
                options:{
                  draggable: false
                },
                events:{
                  mouseover: function(marker, event, data){
                    var map = $(this).gmap3('get'),
                        infowindow = $(this).gmap3({action:'get', name:'infowindow'});
                    if (infowindow){
                      infowindow.open(map, marker);
                      infowindow.setContent(data);
                    } else {
                      $(this).gmap3({action:'addinfowindow', anchor:marker, options:{content: data}});
                    }
                  },
                  mouseout: function(){
                    var infowindow = $(this).gmap3({action:'get', name:'infowindow'});
                    if (infowindow){
                      infowindow.close();
                    }
                  }
                }
              }
            },
            "autofit"
        );
    });
</script>
        </div>
        <div class="row">
            <div class="span8 offset1 map" id="map">
                width:340px;
            </div>
            <div class="span10">
                <h3>Ultimos registros</h3>
            </div>
        </div>
    </div>
</div>
