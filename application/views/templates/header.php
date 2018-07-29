<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SE - VOTE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        echo link_tag('assets/fa/css/font-awesome.min.css');
        echo link_tag('assets/bootstrap/css/bootstrap.min.css');
        echo link_tag('assets/fui/css/flat-ui.min.css');
        echo link_tag('assets/datatables/css/jquery.dataTables.min.css');
        echo link_tag('assets/datatables/css/dataTables.bootstrap.min.css');
    
    ?>
    <style>
    	body{
    		background-color: #eaeded;
    	}
    	h1, h2, h3, h4, h5, h6, p{
    		margin: 0;
    	}
    	.navbar{
    		border-radius: 0;
    	}
    	.navbar-lg .navbar-nav > li > a {
    		padding-top: 14px;
    		padding-bottom: 14px;
    	}
    	ul#profil li a{
    		padding-top: 26px;
    		padding-bottom: 26px;
    	}
    	.panel-body{
    		padding: 0;
    	}
    	.box-icon{
    		padding: 15px 0;
    		color: #fff;
    	}
    	.blue{
    		background-color: #3498db;
    	}
    	.green{
    		background-color: #2ecc71;
    	}
    	.yellow{
    		background-color: #f1c40f;
    	}
    	.box-info{
    		padding-top: 15px;

    	}
    	.panel{
    		border: none;
    		border-radius: 0;
    	}
    	.panel-heading{
    		border-radius: 0;
    	}
    	.panel-danger > .panel-heading {
    		color: #fff;
    		background-color: #e74c3c;
    		border-color: #e74c3c;
		}
		.panel-success > .panel-heading {
    		color: #fff;
    		background-color: #2ecc71;
    		border-color: #2ecc71;
		}

        #myContent{
            padding: 25px;
        }
        
         .dataTables_wrapper div.dataTables_paginate li.paginate_button{
            padding: 4px;
        }
        ul.pagination{
            background: #2f4154;
        }
        ul.pagination > li.paginate_button > a{
            border: none
        }
		@media(max-width: 767px) {
			.box-icon {padding: 20px 0;} 
			.box-info h2{ font-size: 24px; }
		}
		@media(min-width: 768px) and (max-width: 992px) {
			.box-icon {padding: 20px 0;} 
			.box-info h2{ font-size: 24px; }
		}
		@media(min-width: 992px) and (max-width: 1200px) {
			.box-info h2{ font-size: 32px; }
		}
                .myChart p{
                    font-size: 14px;
                }
		.mypanel{
                    padding: 8px ;
		}
                div.media{
                    padding-bottom: 10px;
                }
                div.media-body{
                    line-height: 12px;
                }
                div.media > div.media-body > h4.media-heading{
                    font-size: 21px;
                    margin-bottom: 0;
                }
                div.media > div.media-body > i{
                    font-size: 12px;
                }
                div.media > div.media-body > p{
                    font-size: 14px;
                    line-height: 18px;
                    margin-top: 5px;
                }
        table.dataTable thead .sorting_asc:after {
            content: "";
        }
        table.dataTable thead .sorting_desc:after {
            content: "";
        }
        table.dataTable thead .sorting:after {
            content: "";
        }
    </style>
</head>