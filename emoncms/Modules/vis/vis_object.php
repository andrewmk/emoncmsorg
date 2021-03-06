<?php

    /* Types:
      0 - feed realtime or daily
      1 - feed realtime
      2 - feed daily
      3 - feed histogram
      4 - boolean (not used uncomment lines)
      5 - text
      6 - float value
      7 - int value
      8 - multigraph id
      9 - colour
    */

    //CHAVEIRO TODO: only used in vis_main_view.php, should be php source for vis/widget/vis_render.js vis_widgetlist variable data

    $visualisations = array(
    
        'realtime' => array('label'=>_("RealTime"), 'options'=>array(
            array('feedid',_("feed"),1))
        ),
        
        // Hex colour EDC240 is the default color for flot. since we want existing setups to not change, we set the default value to it manually now,
        'rawdata'=> array('label'=>_("RawData"), 'options'=>array(
            array('feedid',_("feed"),1),
            array('fill',_("fill"),7,0),
            array('colour',_("colour"),9,'EDC240'),
            array('units',_("units"),5,''),
            array('dp',_("dp"),7,'2'),
            array('scale',_("scale"),6,'1'))
        ),
        
        'bargraph'=> array('label'=>_("BarGraph"), 'options'=>array(
            array('feedid',_("feed"),0),
            array('colour',_("colour"),9,'EDC240'),
            array('interval',_("interval"),7,'86400'),
            array('units',_("units"),5,''),
            array('dp',_("dp"),7,'1'),
            array('scale',_("scale"),6,'1'),
            array('delta',_("delta"),7,'0'),
            array('mode',_("mode"),7,'0')
            )
        ),
        
        //'dailyhistogram'=> array('options'=>array(array('feedid',3))),
        'zoom'=> array('label'=>_("Zoom"), 'options'=>array(
            array('power',_("power"),1),
            array('kwhd',_("kwhd"),0),
            array('currency',_("currency"),5,'&pound;'),
            array('currency_after_val',_("currency_after_val"),7, 0),
            array('pricekwh',_("pricekwh"),6,0.14),
            array('delta',_("delta"),7,0)
        )),
        
        //'comparison'=> array('options'=>array(array('feedid',3))),
        'stacked'=> array('label'=>_("Stacked"), 'options'=>array(
            array('bottom',_("bottom"),0),
            array('top',_("top"),0),
            array('colourt',_("colourt"),9,'7CC9FF'),
            array('colourb',_("colourb"),9,'0096FF'),
            array('delta',_("delta"),7,0)
        )),
        
        'stackedsolar'=> array('label'=>_("StackedSolar"), 'options'=>array(
            array('solar',_("solar"),0),
            array('consumption',_("consumption"),0),
            array('delta',_("delta"),7,0)
        )),
        
        'simplezoom'=> array('label'=>_("SimpleZoom"), 'options'=>array(
            array('power',_("power"),1),
            array('kwhd',_("kwh"),0),
            array('delta',_("delta"),7,0)
        )),
        
        'orderbars'=> array('label'=>_("OrderBars"), 'options'=>array(
            array('feedid',_("feed"),0),
            array('delta',_("delta"),7,0)
        )),
        
        'editrealtime'=> array('label'=>_("EditRealtime"), 'options'=>array(
            array('feedid',_("feed"),1)
        )),
        
        'editdaily'=> array('label'=>_("EditDaily"), 'options'=>array(
            array('feedid',_("feed"),2)
        )),
        
        'multigraph' => array ('label'=>_("MultiGraph"), 'action'=>'multigraph', 'options'=>array(
            array('mid',_("mid"),8)
        ))
    );
