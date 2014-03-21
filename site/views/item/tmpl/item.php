<?php
/**
 * @package     db8 locate
 * @author	Peter Martin
 * @copyright   Copyright (C) 2014 Peter Martin / db8.nl
 * @license     GNU General Public License version 2 or later
 */
defined('_JEXEC') or die();

$document = JFactory::getDocument();
$document->addScript('http://maps.google.com/maps/api/js?sensor=false');
$document->addScript('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js');
?>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo $this->item->title; ?></h1>
        <div id="map"></div>
        <style>
            #map {
                width: auto;
                height: 450px;
                border: solid 1pt #b2b2b2;
            }
            .google-map-canvas, .google-map-canvas * { 
                .box-sizing(content-box); 
            }

            /* Optional responsive image override */
            img { max-width: none; }                    

        </style>
        <script type="text/javascript">
            function initialize() {
                var center = new google.maps.LatLng(35, 0);

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: new google.maps.LatLng(<?php echo $this->item->latitude . "," . $this->item->longitude; ?>),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var markers = [];
<?php
echo "var latLng = new google.maps.LatLng(" . $this->item->latitude . "," . $this->item->longitude . ");";
echo "var marker = new google.maps.Marker({
                        position: latLng,
                        draggable: true,
                        icon: '" . JURI::base() . "components/com_db8locate/assets/images/joomla.png',
                        title: '" . str_replace("'", "&apos;", $this->item->title) . "',
                        content: 'test',
                        clickable: true                
                        });";
echo "markers.push(marker);";
?>
                var markerCluster = new MarkerClusterer(map, markers);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <div class="row-fluid">
            <div class="span12"><h2>Info</h2>
                <p><?php echo $this->item->location; ?><br/>
                    <?php echo $this->item->address; ?><br/>
                    <?php echo $this->item->postcode; ?> <?php echo $this->item->city; ?><br/>
                    <?php
                    if (!empty($this->item->region)) {
                        echo $this->item->region . "<br/>";
                    }
                    ?>
                    <?php echo $this->item->country; ?>
                    <br/><br/>
                    Check: <a href="<?php echo $this->item->website; ?>" title="Website of <?php echo $this->item->title; ?>" 
                              target="_blank"><?php echo $this->item->website; ?></a>
                </p>
            </div>

        </div>
    </div>