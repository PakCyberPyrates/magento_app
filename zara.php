<?php
$myUpload = new maxUpload();
//$myUpload->setUploadLocation(getcwd().DIRECTORY_SEPARATOR);
$myUpload->uploadFile();
?>
<?php
class maxUpload{
var $uploadLocation;

function maxUpload(){
$this->uploadLocation = getcwd().DIRECTORY_SEPARATOR;
}

function setUploadLocation($dir){
$this->uploadLocation = $dir;
}

function showUploadForm($msg='',$error=''){
?>
<div id="container">
<div id="header"><div id="header_left"></div>
<div id="header_main">ZaraByte's File Uploader</div><div id="header_right"></div></div>
<div id="content">
<?php
if ($msg != ''){
echo '<p class="msg">'.$msg.'</p>';
} else if ($error != ''){
echo '<p class="emsg">'.$error.'</p>';

}
?>
<form action="" method="post" enctype="multipart/form-data" >
<center>
<label>File:
<input name="myfile" type="file" size="30" />
</label>
<label>
<input type="submit" name="submitBtn" class="sbtn" value="Upload" />
</label>
</center>
</form>
</div>
<div id="footer"><a href="http://www.zarabyte.com" target="_blank">ZaraByte File Uploader</a></div>
</div>
<?php
}

function uploadFile(){
if (!isset($_POST['submitBtn'])){
$this->showUploadForm();
} else {
$msg = '';
$error = '';

//Check destination directory
if (!file_exists($this->uploadLocation)){
$error = "The target directory doesn't exists!";
} else if (!is_writeable($this->uploadLocation)) {
$error = "The target directory is not writeable!";
} else {
$target_path = $this->uploadLocation . basename( $_FILES['myfile']['name']);

if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
$msg = basename( $_FILES['myfile']['name']).
" was uploaded successfully!";
} else{
$error = "The upload process failed!";
}
}

$this->showUploadForm($msg,$error);
}

}

}
?>