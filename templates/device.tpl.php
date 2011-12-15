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
            <div class="span3">
                <p><h3>Usuario</h3>
                <?php echo $this->eprint($this->device->user); ?></p>
                <p><h3>Actualizado</h3>
                <?php
                    echo "<abbr class='timeago' title='".date('c',$this->device->lastUpdated)."'>".spanish_months(date('n',$this->device->lastUpdated)).date(' t, Y',$this->device->lastUpdated)."</abbr>";
                ?></p>
            </div>
            <div class="span3">
                <p><h3>Identificador</h3>
                <?php echo $this->eprint($this->device->uid); ?></p>
            </div>
		</div>
<script>
    $(function(){
        $("#map").gmap3(
            { action: 'addMarkers',
              markers:[
              <?php echo $this->eprint($this->device->markers)?>
                /*{lat:23.73034,lng:-99.16043,data: 'Grande Estación'},
                {lat:23.76316,lng:-99.14115,data: 'Grande Campestre'}*/
              ],
              marker:{
                options:{
                  draggable: false,
                  zoom:3
                },
                events:{
                  click: function(marker, event, data){
                  	$(this).gmap3({
						action:'getAddress',
						latLng:marker.getPosition(),
						callback:function(results){
							var map = $(this).gmap3('get'),
							infowindow = $(this).gmap3({action:'get', name:'infowindow'}),
							content = results && results[1] ? results && results[1].formatted_address : 'Sin dirección';
							if (infowindow){
								infowindow.open(map, marker);
								infowindow.setContent(content);
							} else {
								$(this).gmap3({action:'addinfowindow', anchor:marker, options:{content: content}});
							}
						}
					});
                    /*var map = $(this).gmap3('get'),
                        infowindow = $(this).gmap3({action:'get', name:'infowindow'});
                    if (infowindow){
                      infowindow.open(map, marker);
                      infowindow.setContent(data);
                    } else {
                      $(this).gmap3({
                      	action:'addinfowindow', 
                      	anchor:marker, 
                      	options:{
                      		content: data
                      		}
                      	});
                    }*/
                  }
                  /*,mouseout: function(){
                    var infowindow = $(this).gmap3({action:'get', name:'infowindow'});
                    if (infowindow){
                      infowindow.close();
                    }
                  }*/
                }
              }
            }
            ,"autofit"
        );
    });
</script>
        <div class="row">
            <div class="span10 map" id="map">
            </div>
            <div class="span10">
                <h3>Ultimos registros</h3>
                <table id="last-logs-table" class="zebra-striped">
			    <thead>
			        <tr>
			            <th>#</th>
			            <th>Registrado</th>
			            <th>Latitud</th>
			            <th>Longitud</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php echo $this->rows; ?>
			    </tbody>
			</table>
            </div>
        </div>
    </div>
</div>
