<?php
include_once '../config.php';
$user_id = 1;   // for now, will be served by session in later stages
$friendList = getFriendlist($user_id);
$activeFriends = array();
foreach($friendList as $friend){
    if($friend['active'] == 1){
        $friend['friend_email'] = getUserMail($friend['friend_id']);
        array_push($activeFriends, $friend);
    }
}
include './header.php';
?>
 <table id="view" border: 0 class="viewEvents" align="center">
            <caption><h4>My Friends</h4></caption>
            <thead>
                <?php //if(isset($_GET['delsucc']) and $_GET['delsucc']=="true"){
                  // echo "<tr><th colspan='7' style='background: green; color: #fff'>Event was Deleted Successfully</th></tr>";  
  //              }
                ?>
                <tr>
                    <th>S. No.</th>
                    <th>Email</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1; foreach($activeFriends as $data){ //echo "<pre>"; print_r($data);?>
                <tr>
                    <td><?php echo $a; ?></td>
                    <td><?php echo $data['friend_email'];; ?></td>
                    <td>
                        <a href="editevent.php?id=<?php echo $data['event_id']; ?>" title="Edit Event">Edit</a>
                        <a href="javascript:void(0);" onclick="delConfirm(<?php echo $data['event_id']; ?>);">Delete</a>
                    </td>
            <script type="text/javascript">
                function delConfirm(delId){
                    var conf = confirm("Are you sure ?\n This action cannot be undone");
                    if(conf) window.location.href = "DelConfirm.php?delid="+delId;
                }
            </script>
                </tr>
                <?php $a++; } ?>
            </tbody>
        </table>

<?php include './footer.php'; ?>