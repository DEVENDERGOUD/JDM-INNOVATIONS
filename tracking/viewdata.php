<?php session_start();
include("config.php");
$id=$_REQUEST['id'];
    $getroles = "SELECT r.roleid as roleid,RoleName,Level,PositionCode,r.OrganizationId,org.Name as orgName,(SELECT GROUP_CONCAT(skillname) FROM roleandskills rs left join skills s on s.skillid=rs.skillid where RoleId=r.RoleId group by RoleId) as skills FROM roles r inner join organization org on org.organizationid=r.organizationid where r.isActive=1 and r.organizationid=".$id;
 $roles=$mysqli->query($getroles);
 
 include 'includes/headerO.php';?>
           <div class="container viewdata">
               
           <div class="title-container">
           <div class="row">
               <div class="col-10">
               <strong> Roles </strong>
                </div> 
            </div>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                  <th>Role Name</th>
                  <th>Organization</th>
                  <th>Skills</th>
                  <th>Level</th>
                  <th>Position Code</th>
                </tr>

                <?php
                if(mysqli_num_rows( $roles)>0)
                {
                while($row = mysqli_fetch_array($roles))
                {
                    echo "<tr>";
                    echo "<td>" . $row['RoleName'] . "</td>";
                    echo "<td>" . $row['orgName'] . "</td>";
                    echo "<td>" . $row['skills'] . "</td>";
                    echo "<td>" . $row['Level'] . "</td>";
                    echo "<td>" . $row['PositionCode'] . "</td>";
                    echo "</tr>";
                }
                }
                else
                {
                    echo "<tr><td colspan=5 class='text-center'> No records found";
                    echo "</td></tr>" ;
                }
                ?>
          </table>
           </div>
          
		<?php

include 'includes/footerO.php'
?>
