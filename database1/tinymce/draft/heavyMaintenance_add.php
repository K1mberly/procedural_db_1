<?php require_once("../../../modules/main/views/layouts/header.php"); ?>

<div class="">
    <?php require_once("../../../modules/main/views/layouts/navigation.php"); ?>
    <?php //require_once("../../../modules/main/views/layouts/sidebar.php"); ?>       
    
<!-- CONTENT ********************************************* -->
    <div class="col-md-12 main" id="contenido">
         
        <?php require_once("../../../modules/main/views/layouts/actions/basicActionsAdd.php");?> 
        
        <?php $_SESSION['currentRoot']="heavyMaintenance.php"; ?>    

        <?php 

        $message = "";

        /*$users= aircraft::find_all();*/
        $aircraft=New HeavyMaintenance();
        /*    $aircraft=aircraft::find_by_id($_GET['id']);*/

            if(isset($_POST['create'])){
                //echo "hello";
                
                if($aircraft){
                    $aircraft->aircraft    = $_POST['aircraft'];
                    $aircraft->type        = $_POST['type'];
                    $aircraft->serviceType = $_POST['serviceType'];
                    $aircraft->startDate   = date('y-m-d',strtotime($_POST['startDate']));
                    $aircraft->endDate     = date('y-m-d',strtotime($_POST['endDate']));
                    $aircraft->delay       = $_POST['delay'];
                    $aircraft->progress    = $_POST['progress'];
                    $aircraft->mro         = $_POST['mro'];
                    $aircraft->technicalRep= $_POST['technicalRep'];  
                    $aircraft->notes       = $_POST['notes']; 
                    $aircraft->updateDate  = date('y-m-d',strtotime('today'));                                                            

                    //$aircraft->set_file($_FILES['user_image']);

                    $session->message("The aircraft: {$aircraft->aircraft} has been added");
                    $aircraft->save();
                    redirect("heavyMaintenance.php");
                }
            }
        ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
<!--                         <div class="col-md-12"> -->
                            <form id="addForm" name="addForm" action="" method="post" enctype="multipart/form-data">
                            <!--  enctype="multipart/form-data" : To be able to upload multiple formats-->
                                <div class="col-md-3">                                

                                    <div class="form-group">
                                        <label for="aircraft">Aircraft Register</label>
                                        <input type="text" name="aircraft" class="form-control" required>
                                    </div>   
                                    <div class="form-group">
                                        <label for="aircraft">Aircraft Type</label>
                                        <!-- <input type="text" name="type" class="form-control" required> -->

                                        <select name="type" class="form-control" required>
                                            <option value=""></option>
                                            <option value="A319">A319</option>
                                            <option value="A320">A320</option>
                                            <option value="A321">A321</option>
                                            <option value="A340">A340</option>
                                            <option value="B767">B767</option>
                                            <option value="B777">B777</option>
                                            <option value="B787">B787</option>
                                        </select>

                                    </div>  
                                    <div class="form-group">
                                        <label for="mro">Repair Station</label>
                                        <!-- <input type="text" name="mro" class="form-control" required> -->

                                        <select name="mro" class="form-control" required>
                                            <option value=""></option>
                                            <option value="SCL Hangar 1">SCL Hangar 1</option>
                                            <option value="SCL Hangar 2">SCL Hangar 2</option>                                            
                                            <option value="ETIHAD">ETIHAD</option>
                                            <option value="COOPESA">COOPESA</option>
                                            <option value="MEXICANA">MEXICANA</option>
                                            <option value="TAM LINHAS AEREAS S.A">TAM LINHAS AEREAS S.A</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="serviceType">Service Type</label>
                                        <input type="text" name="serviceType" class="form-control" required>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="progress">WorkpackageProgress (%)</label>                                        
                                        <input type="text" name="progress" class="form-control bfh-number" value="0" data-max="100" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="technicalRep">Technical Rep</label>
                                    <input type="text" name="technicalRep" class="form-control" required>
                                    </div>                                                                     

                                </div>
                                <div class="col-md-offset-1 col-md-8">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="startDate">Start Date (Real)</label>                                                
                                                <div data-name="startDate" class="bfh-datepicker" data-input="form-control" data-format="d-m-y" data-date="today"></div>                                                
                                            </div>
                                        </div>    
                                        <div class="col-md-3">                                            
                                            <div class="form-group">
                                                <label for="endDate">End Date (Scheduled)</label>
                                                <div data-name="endDate" class="bfh-datepicker" data-input="form-control" data-format="d-m-y" data-date="today"></div>                                                                                            
                                            </div>
                                        </div>                                            
                                        <div class="col-md-3">                                            
                                            <div class="form-group">
                                                <label for="delay">Delay (days)</label>                                                
                                                <input type="text" name="delay" class="form-control bfh-number" value="0" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="notes">Notes</label>
                                            <textarea class="form-control" name="notes" id="" cols="30" rows="10">
                                            </textarea>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <input type="submit" id="create" name="create" value="Submit" class="btn btn-primary btn-sm pull-right" style="display: none">
                                    </div>                                    
                                </div>

                            </form>
                        <!-- </div> -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>

<!-- END OF CONTENT ************************************ -->
</div>    
<?php require_once("../../../modules/main/views/layouts/footer.php"); ?>