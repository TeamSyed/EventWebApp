<?php
error_reporting(0);
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
if(isset($_GET['s'])){
    $success = "Operation Successful";
}
include './header.php';
?>
 <table id="view" border: 0 class="viewEvents" align="center">
            <caption><h4>My Friends</h4></caption>
            <thead>
                <?php if(isset($_GET['s']) ){
                  echo "<tr><th colspan='7' style='background: green; color: #fff'>Friend was Deleted Successfully</th></tr>";  
                }
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
                        <a href="javascript:void(0);" onclick="delFriend(<?php echo $data['id']; ?>);">Delete</a>
                    </td>
            <script type="text/javascript">
                function delFriend(delId){
                    var conf = confirm("Are you sure ?");
                    if(conf) window.location.href = "delfriend.php?delid="+delId;
                }
            </script>
                </tr>
                <?php $a++; } ?>
            </tbody>
        </table>

<?php include './footer.php'; ?>