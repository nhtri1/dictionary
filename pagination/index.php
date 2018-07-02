<?php
	include("../model/db_connection.php");
    require_once 'Paginator.class.php';
 
 
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query      = "SELECT * FROM dnqatv_final ORDER BY ID DESC";
 
    $Paginator  = new Paginator( $con, $query );
 
    $results    = $Paginator->getData( $page, $limit );
?>
<!DOCTYPE html>
    <head>
        <title>PHP Pagination</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>
    <body>
        <div class="container">
                <div class="col-md-10 col-md-offset-1">
                <h1>PHP Pagination</h1>
                <table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead>
                                <tr>
                                <th>City</th>
                                <th width="20%">Tu</th>
                                <th width="20%">Nghia</th>
                                <th width="25%">Region</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
        <tr>
                <td><?php echo $results->data[$i]['Tu']; ?></td>
                <td><?php echo $results->data[$i]['Nghia']; ?></td>

        </tr>
<?php endfor; ?>
						</tbody>
                </table>
				<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?> 
                </div>
        </div>
        </body>
</html>