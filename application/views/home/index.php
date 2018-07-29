<?php
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>SE Vote</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <?php
            echo link_tag('assets/bootstrap/css/bootstrap.min.css');
            echo link_tag('assets/fui/css/flat-ui.min.css');
        ?>
        <style>
            body{
                background: #fff;
            }
            #overlay{
                width: 100%;
                height: 100%;
                background: #fff;
                padding-top: 150px;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1;
            }
            #loading-frame{
                width: 70px;
                height: 70px;
                margin: auto;
                position: relative;

            }
            .loader1, .loader2{
                position: absolute;
                border: 5px solid transparent;
                border-radius: 50%;
            }
            .loader1{
                width: 70px;
                height: 70px;
                border-top: 5px solid #ccc;
                border-bottom: 5px solid #ccc;
                animation: animation1 2s linear infinite;
            }
            .loader2{
                width: 55px;
                height: 55px;
                border-left: 5px solid darkturquoise;
                border-right: 5px solid darkturquoise;
                top: 7px; left: 7px;
                animation: animation2 2s linear infinite;
            }
            @keyframes animation1 {
                from {transform: rotate(0deg);}
                to {transform: rotate(360deg);}
            }
            @keyframes animation2 {
                from {transform: rotate(360deg);}
                to {transform: rotate(0deg);}
            }
            @media (min-width: 992px) and (max-width: 1200px){
                #welcome-messege{
                    margin: auto;
                    margin-top: 44px;
                    width: 400px;
                }
            }
            @media (min-width: 1200px){
                #welcome-messege{
                    margin: auto;
                    margin-top: 44px;
                    width: 400px;
                }   
            }
            #welcome-messege{
                padding-top: 30px;
            }
            #hello h4{
                margin: 0;
            }
            #welcome-messege h1{
                margin: 0;
            }
            
            #gambar{
                margin: 0 auto;
                margin-bottom: 10px;
                width: 120px;

            }

            #wrapper{
                display: none;
            }
            .navbar{
                border-radius: 0;
            }
            .panel{
                border-radius: 0;
            }
            .panel-heading{
                border-radius: 0;
            }
            .panel-default > .panel-heading {
                color: #fff;
                background-color: #3498db;
                border-color: #3498db;
            }
            header{
                padding-top: 14px;
            }
            header h4{
                margin: 0;
            }
            div.panel-body div.row{
               padding-top: 8px; 
            }
            .text-center{
                font-size: 14px;
                line-height: 18px;
            }

            footer{
                width: 100%;
                background: #ecf0f1;
                position: absolute;
                bottom: 0;
                left: 0;
            }
            footer p{
                margin: 15px 0;
            }
        </style>
    </head>
    <body>

        <div id="overlay">
            <div id="loading-frame">
                <div class="loader1"></div>
                <div class="loader2"></div>
            </div>
            <p class="text-center" style="margin-top: 10px;">Loading</p>
        </div>

        <div id="welcome-messege" class="text-center">
                <div id="hello">
                    <h4>Selamat Datang</h4>
                    <p><?php echo $fullname; ?></p>    
                </div>
                
                <div id="gambar">
                    <img src="<?php echo base_url('images/smknsituraja.png') ?>" class="img-responsive" alt="smknsituraja.png">
                </div>

                <p>SE-Vote merupakan aplikasi <i>Electronic Vote</i> SMK Negeri Situraja
                untuk pemilihan Calon Ketua dan Wakil Ketua OSIS</p>

                <button type="button" id="startBtn" class="btn btn-primary btn-block">Mulai</button>
        </div>

        <div id="wrapper">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="" class="navbar-brand">SE-Vote</a>
                    </div>
                </div>
            </nav>
            <div class="container">
               
                <div class="row">
                    <?php foreach($candidates->result() as $candidate):?>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Nomor <?php echo $candidate->id; ?></h3>
                            </div>
                            <div class="panel-body">
                                <img src="<?php echo base_url('images/candidates/') . $candidate->photo; ?>"
                                     class="img-responsive" 
                                     alt="<?php echo $candidate->photo; ?>" />
                                <div class="row">
                                    <div class="col-xs-6 text-center"><?php echo $candidate->name1; ?></div>
                                    <div class="col-xs-6 text-center"><?php echo $candidate->name2; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="<?php echo site_url('vote/'. $candidate->id); ?>" class="btn btn-primary btn-block">Pilih</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>

            <footer class="text-center">
                <div class="container">
                    <p>Copyright &copy; 2017 SMKN Situraja</p>
                </div>
            </footer>
        </div>
        
        <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/fui/js/flat-ui.min.js'); ?>"></script>
        <script>
            $(function(){
                $("#overlay").delay(500).fadeOut();

                $("#startBtn").click(function() {
                    $("#welcome-messege").fadeOut();
                    $("#wrapper").delay(500).fadeIn();

                });
            });
        </script>
    </body>
</html>

