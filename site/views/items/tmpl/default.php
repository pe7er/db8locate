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
<script type="text/javascript">
    function initialize() {
        var center = new google.maps.LatLng(35, 0);

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 2,
            center: center,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var markers = [];
<?php
foreach ($this->items as $item) :
    //$title = str_replace("'", "&apos;","<strong>".$item->title."</strong><br/>".$item->city."</br>".$item->country);
    echo "var latLng = new google.maps.LatLng(" . $item->latitude . "," . $item->longitude . ");";
    echo "var marker = new google.maps.Marker({
                position: latLng,
                draggable: true,
                icon: '" . JURI::base() . "components/com_db8locate/assets/images/joomla.png',
                title: '" . str_replace("'", "&apos;", $item->title) . "',
                content: 'test',
                clickable: true                
                });";
    echo "markers.push(marker);";
    ?>
<?php endforeach ?>
        var markerCluster = new MarkerClusterer(map, markers);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="row-fluid">
    <div class="span12">
        <div id="map"></div>
        <style>
            #map {
                width: auto;
                height: 450px;
                border: solid 1pt #b2b2b2;
            }

            /* Optional responsive image override */
            img { max-width: none; }                    

        </style>
        <div class="row-fluid">
            <div class="span12">
                <?php
                $viewTemplate = $this->getRenderedForm();
                echo $viewTemplate;
                ?>

            </div>
        </div> 