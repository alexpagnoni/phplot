<?php

require( 'amproot.php' );
init_amp_root();

OpenLibrary( 'phplot.library' );

$id = basename( $_GET['id'] );

$args = unserialize( file_get_contents( TMP_PATH.'phplot/'.$id ) );

    $graph = new PHPlot( $args['width'], $args['height'] );
    $graph->SetIsInline( '1' );

    //$graph->SetDataColors( array("blue",'white'),array("black") );
    //$graph->$line_style = array('dashed','dashed','solid','dashed','dashed','solid');

    // Base

    $graph->SetDataValues( $args['data'] );
    $graph->SetPlotType( $args['plottype'] );

    // Appearance

    $graph->SetPointShape( $args['pointshape'] );
    $graph->SetPointSize( $args['pointsize'] );
    $graph->SetTitle( $args['title'] );

    // Color

    $graph->SetBackgroundColor( $args['backgroundcolor'] );
    $graph->SetGridColor( $args['gridcolor'] );
    if ( count( $args['legend'] ) ) $graph->SetLegend( $args['legend'] );
    $graph->SetLineWidth( $args['linewidth'] );
    $graph->SetTextColor( $args['textcolor'] );

    $graph->SetDataColors( array( array(145,165,207), array(114,167,112), array(71,85,159), array(175,83,50), array(247,148,53), array(240,231,125), array(154,204,203), array(201,164,196) ), 'black' );

    //$graph->data_color = array( array(145,165,207), array(114,167,112), array(71,85,159), array(175,83,50), array(247,148,53), array(240,231,125), array(154,204,203), array(201,164,196) );
    //array('blue','green','yellow','red','orange');

    $graph->DrawGraph();
    unlink( TMP_PATH.'phplot/'.$id );
?>
