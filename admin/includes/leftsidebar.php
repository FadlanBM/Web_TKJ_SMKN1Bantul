            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="menu-title">Berita</li>

                            <li class="has_sub">
                                <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                         
                            </li>
<?php if($_SESSION['utype']=='1'):?>
  <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Sub-admins </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-subadmins.php">Tambah Sub-admin</a></li>
                                    <li><a href="manage-subadmins.php">Kelola Sub-admin</a></li>
                                </ul>
                            </li>
<?php endif;?>
               


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Kategori </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                	<li><a href="add-category.php">Tambah Kategori</a></li>
                                    <li><a href="manage-categories.php">Kelola Kategori</a></li>
                                </ul>
                            </li>

    
  <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Posts (News) </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-post.php">Add Posts</a></li>
                                    <li><a href="manage-posts.php">Manage Posts</a></li>
                                     <li><a href="trash-posts.php">Trash Posts</a></li>
                                </ul>
                            </li>  
                     

                          
   <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Comments </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                  <li><a href="unapprove-comment.php">Waiting for Approval </a></li>
                                    <li><a href="manage-comments.php">Approved Comments</a></li>
                                </ul>
                            </li>   

                        </ul>
                        <ul>
                        <li class="menu-title"></li>
                        <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                  <li><a href="admin.php">Data Siswa </a></li>
                                    <li><a href="manage-comments.php">Galeri</a></li>
                                </ul>
                            </li>   

                        </ul>
                    </div>
                    <!-- Sidebar -->
                   

                    

                </div>
                <!-- Sidebar -left -->

            </div>