<?php if(!class_exists('raintpl')){exit;}?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo $name;?> </title>

        <!-- <link rel="stylesheet" href="<?php echo $site;?>media/styles/reset.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo $site;?>media/styles/applayout.css" type="text/css" media="screen"/>

        <link rel="stylesheet" href="<?php echo $site;?>media/styles/blog.css" type="text/css" media="screen"/>-->
        <?php $counter1=-1; if( isset($styles) && is_array($styles) && sizeof($styles) ) foreach( $styles as $key1 => $value1 ){ $counter1++; ?>

        <link rel="stylesheet" href="<?php echo $value1;?>" type="text/css" media="screen"/>
        <?php } ?>


    </head>
    <body>
        <div id="wrapper">
            <div id="notification-tier">

            </div>
            <div id="header-tier">
                <div id="display-card">
                    <div id="user-image">
                        <img src="<?php echo $site;?>media/images/app/jaison.png" alt="jaison_justus" />
                    </div>
                    <div id="user-name">
                        <h1><?php echo $name;?></h1>

                    </div>
                    <div id="user-details-primary">
                        <span class="global-message-white">jaison.justus.lp@gmail.com</span><br/>
                        <span class="global-message-white">Trivandrum, India</span>
                        <span class="global-message-white">Contact: 9495195363</span>
                        <br/>
                        <span class="global-message-white">Total Exchanges - 102, Blog Post - 10, Friends - 241</span>
                        <div id="user-stat">
                            <img src="<?php echo $site;?>media/images/app/gold_member.png" alt="gold"/>
                            <span class="short-message">
                                <p>Reputiation</p>
                                <h2>102k</h2>
                            </span>
                            <span  class="short-message">
                                <p>Popularity</p>
                                <h2>87%</h2>
                            </span>
                        </div>
                    </div>
                    <div id="user-details-secondry">
                        <h2>Badges</h2>

                        <span class="badge"> <div class="badge-content">Collector</div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Helper </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Journalist </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Enthusiast </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Gamer </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Penny Black </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Band of Brothers </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Enlighten </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Popular </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Ruke </div><div class="badge-arrow"></div> </span>
                        <span class="badge"> <div class="badge-content">Bishop </div><div class="badge-arrow"></div> </span>
                    </div>
                </div>
            </div>
            <div id="content-tier">
                <div id="blog-posts">
                    <?php $counter1=-1; if( isset($posts) && is_array($posts) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?>

                    <div class="post">
                        <h2>
                            <?php echo $value1["title"];?>


                        </h2>
                        
                        <p>
                            <?php echo $value1["desc"];?>

                        </p>
                        
                        <?php $counter2=-1; if( isset($value1["tag"]) && is_array($value1["tag"]) && sizeof($value1["tag"]) ) foreach( $value1["tag"] as $key2 => $value2 ){ $counter2++; ?>

                        <span class="global-message-black">
                            <?php echo $value2;?>

                        </span>
                        <?php } ?>

                    </div>
                    <hr/>
                    <?php } ?>

                </div>
            </div>
        </div>



        <!-- JAVASCRIPT LOADING -->
        <script type="text/javascript" src="<?php echo $site;?>media/scripts/vendor/jquery/jquery-1.6.js"></script>
        <script type="text/javascript" src="<?php echo $site;?>media/scripts/vendor/ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace( 'blog[editor]', {
                height:200
            });
            
            $(document).ready(function()    {
                $('#test').click(function() {
                    alert($('#blogeditor').val);
                });
            });
        </script>
    </body>
</html>

<!--  <span id="global-message-black">Trivandrum, India</span> -->