<?php require_once 'engine/init.php'; include 'layout/overall/header.php'; ?>

<h1>Server Information</h1>
<p>
Client:	10.98</br>
IP: rojter.tech</br>
Port: 7171
</p>

<h1>Downloads</h1>
<p>In order to play, you need an compatible custom Tibia client.</p>

<p>
Download Tibia client <?php echo ($config['client'] / 100); ?> for windows <a href="<?php echo $config['client_download']; ?>">HERE</a>.</br>
Download Tibia client <?php echo ($config['client'] / 100); ?> for linux <a href="<?php echo $config['client_download_linux']; ?>">HERE</a>.
</p>


<?php 
include 'layout/overall/footer.php'; ?>
