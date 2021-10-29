<?php


$message_sent = false;
if (isset($_POST["name"]) && ($_POST["email"]) != "" && ($_POST["subject"]) != "" && ($_POST["message"]) != "") {
    // submit the form
    $userName = $_POST["name"];
    $userEmail = $_POST["email"];
    $messageSubject = $_POST["subject"];
    $message = $_POST["message"];

    $html = "<table>
    <tr>
    <td>Name : </td>
    <td>$userName , </td>
    <td>Email : </td>
    <td>$userEmail , </td>
    <td>Subject : </td>
    <td>$messageSubject , </td>
    <td>Message : <br></td>
    <td>$message</td>
    </tr>
    </table>";
    include("smtp/PHPMailerAutoload.php");
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = "mds569092@gmail.com";
    $mail->Password = "siddikvai88";
    $mail->setFrom("mds569092@gmail.com");
    $mail->addAddress("mds569092@gmail.com");
    $mail->isHTML(true);
    $mail->Subject = $messageSubject;
    $mail->Body = $html;
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'verify_peer_signed' => false,
    ));
    if ($mail->send()) {
        $message_sent;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form | php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <?php if ($message_sent) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sent</strong> Your message has been sent successfuly.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-md-5 col-xxl-5 col-10 mx-auto mt-5">
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Enter Name</label>
                            <input type="text" class="form-control <?= $invalied_class_name ?? "" ?>" id="name" name="name" aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Title</label>
                            <input type="text" class="form-control" id="subject" name="subject" aria-describedby="emailHelp" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Description</label>
                            <textarea class="form-control" name="message" id="message" rows="4" autocomplete="off"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
