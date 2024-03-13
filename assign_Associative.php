<?php 
session_start();
include('./db_connect.php');

if(isset($_POST['dddadd'])) {
    //$logid = $_POST['log'];
    //$logname = $_POST['logname'];
    $status = $_POST['from_branch_id'];
    $id = $_POST['id'];

    $upt = "UPDATE parcels set from_branch_id= $status where id = $id";
    $exu = mysqli_query($conn, $upt);
    //$exu="";
    $a="sarath@cyberiasoftwares.com";
    
    $msg='Assign New Parcel'.'<br>'.
    'Parcel Id'." " .$id. '<br>'.
    'Password is'." ".$id;
    $subject='Assign Parcel Sharing';
    require 'vendor/autoload.php';

    require('Mail/phpmailer/PHPMailerAutoload.php'); 
    $mail = new PHPMailer;
    $mail->SMTPDebug = 0;
    //$mail->isMail(); 
    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'cargomasters4u@gmail.com';          // SMTP username
    $mail->Password = 'RRRugma@2001'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to
    
    $mail->setFrom('cargomasters4u@gmail.com');
    $mail->addReplyTo('cargomasters4u@gmail.com');
    $mail->addAddress($a);   // Add a recipient
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;
    $mail->send();


    
    if($exu) {
        echo "<script>alert('Assign Associative');window.location.href='./index.php?page=track'</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<form method="post" action="assign_Associative.php">
    <div class="container-fluid">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <div class="form-group">
            <label for="">Assign Associative</label>
            <select name="from_branch_id" id="from_branch_id" class="form-control select2" required="">
                <option value=""></option>
                <?php 
                  $branches = $conn->query("SELECT *,concat(cus_name,', ',cus_address,', ',cus_state) as address FROM associatives");
                    while($row = $branches->fetch_assoc()):
                ?>
                  <option value="<?php echo $row['cus_logid'] ?>" <?php echo isset($from_branch_id) && $from_branch_id == $row['cus_logid'] ? "selected":'' ?>><?php echo $row['cus_name']. ' | '.(ucwords($row['cus_address'])) ?></option>
                <?php endwhile; ?>
              </select>
            
            
        </div>
    </div>
    <div class="modal-footer display p-0 m-0">
        <button type="submit" name="dddadd" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" onclick="uni_modal('Parcel\'s Details','view_parcel.php?id=<?php echo $_GET['id'] ?>','large')">Close</button>
    </div>
</form>
<style>
    #uni_modal .modal-footer {
        display: none;
    }
    #uni_modal .modal-footer.display {
        display: flex;
    }
</style>
