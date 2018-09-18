<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="Admin/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Logo -->
                        <div class="logo">
                            <h1><a href="index.html">Admin panel</a></h1>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-lg-12">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="navbar navbar-inverse" role="banner">
                            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                                        <ul class="dropdown-menu animated fadeInUp">

                                            <li><a href="login.html">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar content-box" style="display: block;">
                        <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="?action=load_business"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="?action=load_business"><i class="glyphicon glyphicon-cog"></i> Company Info</a></li>
                    <li><a href="?action=product_add"><i class="glyphicon glyphicon-cog"></i>Products</a></li>
                    <li><a href="?action=load_section_one"><i class="glyphicon glyphicon-cog"></i> Homepage</a></li>
                    <li><a href="?action=manage_products"><i class="glyphicon glyphicon-cog"></i>Product Details</a></li>
                    <li><a href="?action=find_product"><i class="glyphicon glyphicon-cog"></i>Edit Product</a></li>
                </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="tab">
                            <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'sectionOne')">Homepage-section one</button>
                            <button class="tablinks" onclick="openCity(event, 'sectionTwo')">Homepage-section two</button>
                            <button class="tablinks" onclick="openCity(event, 'sectionThree')">Homepage section 3 - Product overview</button>
                        </div>  
                        <br><br>

                        <div class="content-box-large tabcontent" id="sectionOne">
                            <div class="panel-heading">
                                <div class="panel-title"><h2>Slide in Pictures with slide in text (section one)</h2></div>

                                <div class="panel-options">
                                    <a href="#" data-rel="reload"><i class="glyphicon glyphicon-hand-down"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <h3>Add a slide in picture with content </h3>
                                <form action="" method="post"  enctype="multipart/form-data">

                                    <div class="col-sm-7"><label>Primary / Top text</label><br>
                                        <input required class="form-control" type="text" name="prim_text"><br></div>

                                    <div class="col-sm-7"><label>Secondary / bottom text</label><br>
                                        <input required class="form-control" type="text" name="sec_text"><br></div>
                                    <div class="col-sm-7"><label>Picture</label>
                                        <input required type="file" name="slide_pic"> <br></div>
                                    <div class="col-sm-7"><input type="submit" value="Add new content" class="btn btn-primary"><br><br></div>
                                    <input type="hidden" name="action" value="add_section_one">
                                   <input type="hidden" name="section" value="one">
                                </form><br>

                                <div class="col-sm-7"><hr><h3>Edit existing content and picture</h3></div>
                                            <div class="col-sm-9"><table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Delete</th>
                                                            <th>Primary text</th>
                                                            <th>Secondary text</th>
                                                            <th>Image</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php foreach( $sectionone as $sect) : ?>
                                                        <form method="post"  enctype="multipart/form-data">
                                                        <tr>
                                                            <td ><a href="controller_index.php?action=delete_section_one&sectionone_id=<?php echo $sect['SectionID'];?>&section=one"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                                    <td> <input type="text" name="prim_text" value="<?php echo $sect['FirstText'];?>"></td>
                                                                    <td><input type="text" name="sec_text" value="<?php echo $sect['SecondText'];?>"></td>
                                                            <td><img src="<?php echo "images/".$sect['ImagePath'];?>" alt="<?php echo "images/".$sect['ImagePath'];?>" width="80"> <br>
                                                                <p>Change image: </p>
                                                               
                                                                    <input type="file" name="slide_pic"><br>
                                                                    <input type="submit" value="update" class="btn btn-primary">
                                                                       <input type="hidden" name="action" value="update_section_one">
                                                                       <input type="hidden" name="Sec_id" value="<?php echo $sect['SectionID'];?>">
                                                                      
                                                                        <input type="hidden" name="section" value="one">
                                                                           <input type="hidden" name="old_pic" value="<?php echo $sect['ImagePath'];?>">
                                                                
                                                            </td>
                                                            
                                                        </tr>
                                                        </form>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>    
                                            </div>
                                            </div>
                                            <br><br>

                                            <!-- Section 2 -->
                                            <div class="content-box-large tabcontent" id="sectionTwo">
                                                <div class="panel-heading">
                                                    <div class="panel-title"><h2>Categories with background images</h2></div>

                                                    <div class="panel-options">
                                                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-hand-down"></i></a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <h3>Categories mixed with pictures and descriptive texts </h3>
                                                    <form action="" method="post"   enctype="multipart/form-data">

                                                        <div class="col-sm-7"><label>Type in Category</label><br>
                                                            <input type="text" class="form-control" name="categpry">
                                                            <br></div>

                                                        <div class="col-sm-7"><label>Descriptive text</label><br><input required class="form-control" type="text" name="prim_text"><br></div>
                                                        <div class="col-sm-7"><label>Picture</label>
                                                            <input required type="file" name="slide_pic"> <br></div>
                                                        <div class="col-sm-7"><input type="submit" value="Add new quick links" class="btn btn-primary"><br><br></div>
                                                     <input type="hidden" name="action" value="add_section_one">
                                                  <input type="hidden" name="section" value="two">
                                                    </form><br>

                                                    <div class="col-sm-7"><hr><h3>Edit existing content and picture<h3></div>
                                                                <div class="col-sm-9"><table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Delete</th>
                                                                                <th>Category</th>
                                                                                <th>Catchy text</th>
                                                                                <th>Image</th>
                                                                            </tr>
                                                                        </thead>

                                                                      <tbody>
                                                        <?php foreach( $sectiontwo as $sect) : ?>
                                                        <form method="post"  enctype="multipart/form-data">
                                                        <tr>
                                                            <td ><a href="controller_index.php?action=delete_section_one&sectionone_id=<?php echo $sect['SectionID'];?>&section=two"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                                    <td> <input type="text" name="prim_text" value="<?php echo $sect['FirstText'];?>"></td>
                                                                    <td><input type="text" name="sec_text" value="<?php echo $sect['SecondText'];?>"></td>
                                                            <td><img src="<?php echo "images/".$sect['ImagePath'];?>" alt="<?php echo "images/".$sect['ImagePath'];?>" width="80"> <br>
                                                                <p>Change image: </p>
                                                               
                                                                    <input type="file" name="slide_pic"><br>
                                                                    <input type="submit" value="update" class="btn btn-primary">
                                                                       <input type="hidden" name="action" value="update_section_one">
                                                                       <input type="hidden" name="Sec_id" value="<?php echo $sect['SectionID'];?>">
                                                                        <input type="hidden" name="section" value="two">
                                                                       
                                                                           <input type="hidden" name="old_pic" value="<?php echo $sect['ImagePath'];?>">
                                                                
                                                            </td>
                                                            
                                                        </tr>
                                                        </form>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                                    </table>
                                                                </div>    
                                                                </div>
                                                                </div>

                                                                <br><br>



                                                                <!-- Section 3 -->
                                                                <div class="content-box-large tabcontent" id="sectionThree">
                                                                    <div class="panel-heading">
                                                                        <div class="panel-title"><h2>Product Overview section - product </h2></div>

                                                                        <div class="panel-options">
                                                                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-hand-down"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <h3>Add top pictures(NB this feature has a bug and will be updated in future versions)</h3>
                                                                        <form method="post" action="">
                                                                            <div class="col-sm-7"><label>Secondary / bottom text</label><br>
                                                                                <select class="form-control" name="show_product">
                                                                                     <?php foreach( $not_showing as $sect) : ?>
                                                                                    <option value="<?php echo $sect['productID'];?>"><?php echo $sect['productDesc'];?></option>
                                                                                     <?php endforeach;?>
                                                                                </select><br></div>
                                                                            <input type="hidden" name="action" value="add_section_three">
                                                                            <div class="col-sm-7"><input type="submit" disabled value="Add new content" class="btn btn-primary"><br><br></div>
                                                                        </form><br>

                                                                        <div class="col-sm-7"><hr><h3>Edit existing content and picture</h3></div>
                                                                        <div class="col-sm-9"><table class="table table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Option</th>
                                                                                        <th>Category</th>                                 
                                                                                        <th>Image</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <?php foreach( $showing as $sect) : ?>
                                                                                    <form method="post"  enctype="multipart/form-data">
                                                                                        <tr>
                                                                                            <td ><a href="controller_index.php?action=remove_product&product_id=<?php //echo $sect['productID'];?>&section=three"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                                                            <td> <?php echo $sect['categoryDesc'];?></td>
                                                                                            <td><img src="<?php echo "".$sect['productImagePath'];?>" alt="<?php echo "".$sect['productImagePath'];?>" width="80"> <br>
                                                                                            <p>Change image: </p>

                                                                                            <input type="file" name="slide_pic"><br>
                                                                                            <input type="submit" disabled value="update" class="btn btn-primary">
                                                                                            <input type="hidden" name="action" value="update_product_pic">
                                                                                            <input type="hidden" name="product_id" value="<?php echo $sect['productID'];?>">
                                                                                            <input type="hidden" name="section" value="three">

                                                                                            <input type="hidden" name="old_pic" value="<?php echo $sect['productImagePath'];?>">

                                                                                            </td>

                                                                                        </tr>
                                                                                    </form>
                                                                                <?php endforeach;?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                <footer>
                                                                    <div class="container">

                                                                        <div class="copy text-center">
                                                                            Copyright 2018 <a href='#'>Healing & Anathi & Sinobom</a>
                                                                        </div>

                                                                    </div>
                                                                </footer>

                                                                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                                                                <script src="https://code.jquery.com/jquery.js"></script>
                                                                <!-- Include all compiled plugins (below), or include individual files as needed -->
                                                                <script src="Admin/bootstrap/js/bootstrap.min.js"></script>
                                                                <script src="Admin/js/custom.js"></script>
                                                                
                                                        
                                                              <?php if(isset($_GET["section"])){
                                                            if ($_GET["section"] == "two") { ?>
                                                            <script type='text/javascript'> 
                                                            openCity(event, 'sectionTwo');
                                                            </script>
                                                            <?php } elseif ($_GET["section"] == "three") {?>
                                                                <script type='text/javascript'> 
                                                            openCity(event, 'sectionThree');
                                                            </script>
                                                              <?php }else {?>
                                                                <script type='text/javascript'> 
                                                             openCity(event, 'sectionOne');
                                                            </script>
                                                            <?php }} else {?>
                                                                <script type='text/javascript'> 
                                                             openCity(event, 'sectionOne');
                                                            </script>
                                                            <?php } ?>
                                                            <script>
                                                                // document.getElementById("defaultOpen").click();
                                                                </script>
                                                                </body>
                                                                </html>