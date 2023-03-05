<?php
require_once("../app/config.php");
$title=addslashes("Support Ticket");
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
$user_id=$row['id'];

//$bf=mysqli_query($dbc, "SELECT * FROM support WHERE user_id='$user_id' ORDER BY support.id DESC");
$bff=$dbc->prepare("SELECT * FROM support WHERE user_id= ? ORDER BY support.id DESC");
$bff->bind_param("i", $user_id);
$bff->execute();
$bf=$bff->get_result();
$bff->close();


?>
<div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
            <h4><i class="icon-bubbles5 mr-2"></i> <span class="font-weight-semibold">Customer Service</span></h4>
          </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="./" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <a href="./ticket" class="breadcrumb-item">ticket</a>
            </div>
          </div>

          <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
              <a href="./fund/0" class="breadcrumb-elements-item">
                <i class="icon-credit-card mr-2 text-success"></i>
                Fund account
              </a>
              <!--a href="./buy_bitcoin" class="breadcrumb-elements-item">
                <i class="icon-coin-dollar mr-2 text-danger"></i>
                Buy bitcoin
              </a-->    
             <a href="ticket" class="breadcrumb-elements-item">
                <i class="icon-comment-discussion mr-2 text-info"></i>
                Support
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /page header -->
<div class="content">
        <!-- Page length options -->
        <div class="card">
          <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Tickets</h6>
              <div class="header-elements">
                <div class="list-icons text-orange-600">
                  <a class="list-icons-item" data-action="collapse"></a>
  
                </div>
              </div>
          </div>
          <table class="table datatable-show-all">
            <thead>
              <tr>
              <th>S/N</th>
              <th>Ticket ID</th>
              <th>Subject</th>
              <th>Priority</th>
              <th>Date</th>
              <th>Status</th>
              <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>  
<?php while($df=$bf->fetch_assoc()){?>    
              <tr>
          <td><?php echo $index++;?>.</td>
          <td class="text-danger">[#<?php echo clean($df['ticket_id']); ?>]</td>      
          <td><?php echo clean($df['subject']); ?></td>      
          <td><?php echo clean($df['priority']); ?></td>     
          <td><?php echo date("Y/m/d h:i:A", strtotime($df['date'])); ?></td>      
          <td><?php  if($df['status']==0){echo 'Open';} else if($df['status']==1){echo 'Closed';}else if($df['status']==2){echo 'Resolved';}?></td>
          <td class="text-center">
            <div class="list-icons">
              <div class="dropdown">
                <a href="#" class="list-icons-item" data-toggle="dropdown">
                  <i class="icon-menu9"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="check_ticket/<?php echo clean($df['ticket_id']);?>" class="dropdown-item"><i class="icon-bubbles5 mr-2"></i>Reply</a>
                  <a data-toggle="modal" data-target="#<?php echo clean($df['ticket_id']);?>delete" class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                </div>
              </div>
            </div>
          </td>
              </tr>
        <div id="<?php echo clean($df['ticket_id']);?>delete" class="modal fade" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-secondary">
                <h6 class="modal-title">Delete Ticket #<?php echo clean($df['ticket_id']);?></h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                <h6 class="font-weight-semibold"></h6>
                <p>You are about to delete ticket #<?php echo clean($df['ticket_id']);?>, this can't be undone.</p>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <a  href="../app/user?id=delete_ticket&del=<?php echo clean($df['ticket_id']);?>" class="btn bg-danger">Proceed</a>
              </div>
            </div>
          </div>
        </div>
<?php } ?>
           </tbody>
          </table>
        </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="alert bg-warning text-white alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          Don't submit thesame ticket more than once
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">

      <!-- Basic layout-->
      <div class="card">
        <div class="card-header header-elements-inline">
          <h6 class="card-title font-weight-semibold">Create ticket</h5>
              <div class="header-elements">
                <div class="list-icons text-orange-600">
                <a class="list-icons-item" data-action="collapse"></a>

              </div>
            </div>
        </div>

        <div class="card-body">
          <form action="../app/user/ticket" method="post">
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Subject:</label>
                <div class="col-lg-10">
                  <input type="text" name="title" class="form-control" required>
                  <input type="number" hidden name="user" value="<?php echo clean($row['id']);?>">
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Priority</label>
                <div class="col-lg-10">
                <select class="form-control select" name="category" data-dropdown-css-class="bg-slate-800" data-fouc required>
                  <option  value="Low">Low</option>
                  <option  value="Medium">Medium</option> 
                  <option  value="High">High</option>  
                </select>
              </div>
              </div> 
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Message</label>
                <div class="col-lg-10">
                  <textarea rows="3" cols="3" class="form-control" name="editor" placeholder=""required></textarea>
                </div>
              </div>                
            <div class="text-right">
              <button type="submit" class="btn bg-success">Submit form <i class="icon-paperplane ml-2"></i></button>
            </div>
          </form>
        </div>
      </div>
      <!-- /basic layout -->
    </div>
  </div>
      </div>
<?php require_once('include/user_footer.php');?>