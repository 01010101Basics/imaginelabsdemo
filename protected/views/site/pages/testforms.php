
<?php 

exec("curl -o /var/www/research/forms/1592940730.docx http://cesfiledata.s3.amazonaws.com/metresearch/1592940730.docx"); 

$from = "Ken Goddard";
$from_name="ken.goddard@cableeng.com";
$replyto = $from_name;
$mailto ="ken.goddard@cableeng.com";
$filename="1592940730.docx ";
$file = "/var/www/research/forms/1592940730.docx";
$message="Attached is the project research request";
$subject ="Test Send Attachment";
//
$content = file_get_contents( $file);
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$name = basename($file);
//
// header
$header = "From: ".$from." <".$from_name.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

// message & attachment
$nmessage = "--".$uid."\r\n";
$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $message."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";

mail($mailto, $subject, $nmessage, $header);




if (!unlink($file)) {  
    echo ("$file cannot be deleted due to an error");  
}  
else {  
    echo ("$file has been deleted");  
} 
?>  
